FROM nginx:1.15.2-alpine

USER root

# Install certbot and a few other nice-to-haves
RUN apk add --no-cache certbot bash vim

# Copy the nginx configuration we use just for getting an initial SSL cert
COPY nginx.startup.conf /etc/nginx/nginx.startup.conf

# Start nginx
RUN nginx -c /etc/nginx/nginx.startup.conf &

# # Get SSL certs for all the domains we serve
# RUN certbot certonly --webroot -w /usr/share/nginx/html \ 
#     -d nathanfriend.io -d www.nathanfriend.io -d nathanfriend.com -d www.nathanfriend.com \
#     -d dev.nathanfriend.io -d dev.nathanfriend.com \
#     -d bethany.and.nathanfriend.io -d www.bethany.and.nathanfriend.io -d bethany.and.nathanfriend.com -d www.bethany.and.nathanfriend.com \
#     -n --agree-tos --email hello@nathanfriend.io

RUN certbot certonly --webroot -w /usr/share/nginx/html \ 
    -d asdf.nathanfriend.io -d www.asdf.nathanfriend.io \
    -d blah.nathanfriend.io -d www.blah.nathanfriend.io \
    -n --agree-tos --email hello@nathanfriend.io

# Stop nginx
RUN nginx -s stop

# Setup certbot to renew the certs every day
COPY renew /etc/periodic/daily/renew

# TODO: test if the above works.  Don't think it does yet, but haven't tested.
# https://wiki.alpinelinux.org/wiki/Alpine_Linux:FAQ#My_cron_jobs_don.27t_run.3F