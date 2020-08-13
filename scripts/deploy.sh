#!/usr/bin/env bash

##
## Run ssh-agent (inside the build environment)
##
eval $(ssh-agent -s)

##
## Add the SSH key stored in SSH_PRIVATE_KEY variable to the agent store
## We're using tr to fix line endings which makes ed25519 keys work
## without extra base64 encoding.
## https://gitlab.com/gitlab-examples/ssh-private-key/issues/1#note_48526556
##
echo "$SSH_PRIVATE_KEY" | tr -d '\r' | ssh-add -

##
## Create the SSH directory and give it the right permissions
##
mkdir -p ~/.ssh
chmod 700 ~/.ssh

##
## Verify the SSH host keys.
## See https://docs.gitlab.com/ee/ci/ssh_keys/#verifying-the-ssh-host-keys
##
echo "$SSH_KNOWN_HOSTS" >> ~/.ssh/known_hosts
chmod 644 ~/.ssh/known_hosts

ssh -p ${SSH_PORT} ${SERVER_USER}@${SERVER_ADDR} <<EOF

  echo "Cloning the website-3.0-docker repo locally, (if necessary)..."
  if [[ ! -d website-3.0-docker ]]; then
    cd /home/${SERVER_USER}
    git clone https://gitlab.com/nfriend/website-3.0-docker.git
  fi

  echo "Navigating to the local repo..."
  cd /home/${SERVER_USER}/website-3.0-docker

  echo "Updating the local repo..."
  git checkout master
  git fetch
  git reset --hard origin/master

  echo "Taking down any current services..."
  docker-compose -f docker-compose.yml -f docker-compose.production.yml down

  echo "Coping temporary SSL certificates..."
  mkdir -p /home/${SERVER_USER}/website-3.0-docker/certbot/www
  mkdir -p /home/${SERVER_USER}/website-3.0-docker/certbot/conf/live/${SERVER_ADDR}
  rsync --archive \
        --verbose \
        --ignore-existing \
        --human-readable \
        nginx/deployed/temp.cert.pem \
        /home/${SERVER_USER}/website-3.0-docker/certbot/conf/live/${SERVER_ADDR}/fullchain.pem
  rsync --archive \
        --verbose \
        --ignore-existing \
        --human-readable \
        nginx/deployed/temp.key.pem \
        /home/${SERVER_USER}/website-3.0-docker/certbot/conf/live/${SERVER_ADDR}/privkey.pem

  echo "Installing all dependencies.."
  npm install

  echo "Bringing up all the services..."
  docker-compose -f docker-compose.yml -f docker-compose.production.yml up -d
EOF
