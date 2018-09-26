#!/bin/bash

# Start a temporary nginx instance
nginx -c /etc/nginx/nginx.startup.conf

if [ "$USE_DEV_CERTS" = "true" ];
then
    echo "The 'USE_DEV_CERTS' environment variable is 'true'. Skipping Let's Encrypt and using local certs instead."

    mkdir -p /etc/letsencrypt/live/nathanfriend.io

    mv /temp/dev-certs/cert.pem /etc/letsencrypt/live/nathanfriend.io/cert.pem
    mv /temp/dev-certs/privkey.pem /etc/letsencrypt/live/nathanfriend.io/privkey.pem
else

    # Test if we already have existing certificates. If we don't,
    # get new ones.  Otherwise, just try and renew the existing ones.
    if [ -d /etc/letsencrypt/live ] && [ ! -z "$(ls -A /etc/letsencrypt/live)" ];
    then 
        echo "Existing certificates were found... running renewal"

        certbot renew
    else
        echo "No existing certificates found... requesting new ones from Let's Encrypt"

        # certbot certonly --test-cert --webroot -w /usr/share/nginx/html \
        # -d asdf.nathanfriend.io -d www.asdf.nathanfriend.io \
        # -d blah.nathanfriend.io -d www.blah.nathanfriend.io \
        # -n --agree-tos --email hello@nathanfriend.io

        # Get SSL certs for all the domains we serve
        certbot certonly --webroot -w /usr/share/nginx/html \
            -d nathanfriend.io -d www.nathanfriend.io -d nathanfriend.com -d www.nathanfriend.com \
            -d dev.nathanfriend.io -d dev.nathanfriend.com \
            -d bethany.and.nathanfriend.io -d www.bethany.and.nathanfriend.io -d bethany.and.nathanfriend.com -d www.bethany.and.nathanfriend.com \
            -n --agree-tos --email hello@nathanfriend.io
    fi

fi

# Make all our cron script executable
# From https://superuser.com/a/91938/144803
find /etc/periodic -type f -exec chmod +x {} +

# Initialize any cron scripts
run-parts /etc/periodic/daily

# Stop the temporary instance
nginx -s stop

# Give nginx some time to stop
sleep 1

# Start the real nginx instance
nginx -g "daemon off;"

