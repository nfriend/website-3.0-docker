#!/usr/bin/env bash

# Note: This script will be executed on the production server.

# Based on the script found in
# https://medium.com/@pentacent/nginx-and-lets-encrypt-with-docker-in-less-than-5-minutes-b4b8a60d3a71

# Navigate to the working directory this script requires
pushd /home/gitlabci/website-3.0-docker

domains=(
  nathanfriend.io
  nathanfriend.com
  nathanfriend.dev
  www.nathanfriend.io
  www.nathanfriend.com
  www.nathanfriend.dev
  dev.nathanfriend.io
  dev.nathanfriend.com
  dev.nathanfriend.dev
  bethany.and.nathanfriend.io
  bethany.and.nathanfriend.com
  bethany.and.nathanfriend.dev
  www.bethany.and.nathanfriend.com
  www.bethany.and.nathanfriend.dev
  www.bethany.and.nathanfriend.io
)
email="contact@nathanfriend.io"
staging=0 # Set to 1 if you're testing your setup to avoid hitting request limits
rsa_key_size=4096

echo "### Deleting dummy certificate for $domains ..."
docker-compose -f docker-compose.yml \
               -f docker-compose.production.yml \
               run --rm --entrypoint "\
  rm -Rf /etc/letsencrypt/live/$domains && \
  rm -Rf /etc/letsencrypt/archive/$domains && \
  rm -Rf /etc/letsencrypt/renewal/$domains.conf" certbot
echo

echo "### Requesting Let's Encrypt certificate for $domains ..."
#Join $domains to -d args
domain_args=""
for domain in "${domains[@]}"; do
  domain_args="$domain_args -d $domain"
done

# Select appropriate email arg
case "$email" in
  "") email_arg="--register-unsafely-without-email" ;;
  *) email_arg="--email $email" ;;
esac

# Enable staging mode if needed
if [ $staging != "0" ]; then staging_arg="--staging"; fi

docker-compose -f docker-compose.yml \
               -f docker-compose.production.yml \
               run --rm --entrypoint "\
  certbot certonly --webroot -w /var/www/certbot \
    $staging_arg \
    $email_arg \
    $domain_args \
    --rsa-key-size $rsa_key_size \
    --agree-tos \
    --force-renewal" certbot
echo

echo "### Reloading nginx ..."
docker-compose -f docker-compose.yml \
               -f docker-compose.production.yml \
               exec nginx nginx -s reload


# Navigate back to the user's original working directory
popd
