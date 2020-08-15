#!/usr/bin/env bash

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
npm update

echo "Bringing up all the services..."
docker-compose -f docker-compose.yml -f docker-compose.production.yml up -d
