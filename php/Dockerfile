FROM php:fpm

EXPOSE 9300

# Enable the mysqli extension (for Inspiral Web)
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable the socket extension (for Rook)
RUN docker-php-ext-install sockets && docker-php-ext-enable sockets

# Copy our custom.ini file
COPY custom.ini /usr/local/etc/php/conf.d/custom.ini
