FROM nginx:1.15.2-alpine

USER root

# Install certbot
RUN apk add --no-cache certbot

# # Get SSL certs for all the domains we serve
# RUN certbot certonly --webroot -w /usr/share/nginx/html \ 
#     -d nathanfriend.io -d www.nathanfriend.io -d nathanfriend.com -d www.nathanfriend.com \
#     -d dev.nathanfriend.io -d dev.nathanfriend.com \
#     -d bethany.and.nathanfriend.io -d www.bethany.and.nathanfriend.io -d bethany.and.nathanfriend.com -d www.bethany.and.nathanfriend.com \
#     -n --agree-tos --email hello@nathanfriend.io

RUN certbot certonly --webroot -w /usr/share/nginx/html \ 
    -d asdf.nathanfriend.io -d www.asdf.nathanfriend.io -d \
    -d blah.nathanfriend.io -d www.blah.nathanfriend.io \
    -n --agree-tos --email hello@nathanfriend.io

# Setup certbot to renew the certs every day
COPY renew.sh /etc/periodic/daily/renew.sh

# TODO: test if the above works.  Don't think it does yet, but haven't tested.
# https://wiki.alpinelinux.org/wiki/Alpine_Linux:FAQ#My_cron_jobs_don.27t_run.3F