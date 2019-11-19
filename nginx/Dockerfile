FROM nginx:1.16.1-alpine

USER root

# Install certbot and a few other nice-to-haves
RUN apk add --no-cache --update certbot bash vim nodejs nodejs-npm

# Copy the dev certs in case we need to use them (see startup.sh)
COPY dev-certs/* /temp/dev-certs/

# Copy the nginx configuration we use just for getting an initial SSL cert
COPY nginx.startup.conf /etc/nginx/nginx.startup.conf

# Copy the startup script and make it runnable
COPY startup.sh /etc/nginx/startup.sh
RUN chmod u+x /etc/nginx/startup.sh

# Setup certbot to renew the certs every day
COPY renew /etc/periodic/daily/renew
RUN chmod a+x /etc/periodic/daily/renew

ENTRYPOINT [ "/etc/nginx/startup.sh" ]
