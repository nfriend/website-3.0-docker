FROM php:fpm

# Enable the mysqli extension (for Inspirograph)
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Enable the gd extension (for Drupal)
# Install the PHP gd library
RUN apt-get update -y && apt-get install -y libpng-dev
RUN docker-php-ext-install gd && docker-php-ext-enable gd

# Copy our custom.ini file
COPY custom.ini /usr/local/etc/php/conf.d/custom.ini