FROM nginx:1.15.2-alpine

USER root

# Install certbot and a few other nice-to-haves
RUN apk add --no-cache certbot bash vim

# Copy the nginx configuration we use just for getting an initial SSL cert
COPY nginx.startup.conf /etc/nginx/nginx.startup.conf

# Copy the startup script and make it runnable
COPY startup.sh /etc/nginx/startup.sh
RUN chmod u+x /etc/nginx/startup.sh

# Setup certbot to renew the certs every day
COPY renew /etc/periodic/daily/renew

# TODO: test if the above works.
# https://wiki.alpinelinux.org/wiki/Alpine_Linux:FAQ#My_cron_jobs_don.27t_run.3F

ENTRYPOINT [ "/etc/nginx/startup.sh" ]