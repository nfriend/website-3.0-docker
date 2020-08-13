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

  ##
  ## Clone the website-3.0-docker repo locally, if necessary
  ##
  if [[ ! -d website-3.0-docker ]]; then
    cd /home/${SERVER_USER}
    git clone https://gitlab.com/nfriend/website-3.0-docker.git
  fi

  ##
  ## Navigate to the local repo
  ##
  cd /home/${SERVER_USER}/website-3.0-docker

  ##
  ## Update the local repo
  ##
  git checkout master
  git fetch
  git reset --hard origin/master

  ##
  ## Take down any current services
  ##
  docker-compose down

  ##
  ## Install all dependencies
  ##
  npm install

  ##
  ## Bring up all the services
  ##
  docker-compose up -d
EOF
