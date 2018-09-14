#!/bin/bash

# Start a temporary nginx instance
nginx -c /etc/nginx/nginx.startup.conf

# Get SSL certs for all the domains we serve
# certbot certonly --webroot -w /usr/share/nginx/html \ 
#     -d nathanfriend.io -d www.nathanfriend.io -d nathanfriend.com -d www.nathanfriend.com \
#     -d dev.nathanfriend.io -d dev.nathanfriend.com \
#     -d bethany.and.nathanfriend.io -d www.bethany.and.nathanfriend.io -d bethany.and.nathanfriend.com -d www.bethany.and.nathanfriend.com \
#     -n --agree-tos --email hello@nathanfriend.io

certbot certonly --webroot -w /usr/share/nginx/html \
    -d asdf.nathanfriend.io -d www.asdf.nathanfriend.io \
    -d blah.nathanfriend.io -d www.blah.nathanfriend.io \
    -n --agree-tos --email hello@nathanfriend.io

# Stop the temporary instance
nginx -s stop

# Give nginx some time to stop
sleep 1

# Start the real nginx instance
nginx -g "daemon off"

