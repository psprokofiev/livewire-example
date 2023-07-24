FROM php:8.2.7-fpm-buster

ENV COMPOSER_VERSION 2.5.8
ENV NODE_VERSION "18.x"

RUN apt-get update
RUN apt install -y apt-utils

# Install dependencies
RUN apt-get install -qq -y \
  curl \
  git \
  libzip-dev \
  libxslt-dev \
  zlib1g-dev \
  zip unzip

RUN apt install -y libmcrypt-dev libicu-dev libxml2-dev
RUN apt-get install -y libjpeg-dev libpng-dev libfreetype6-dev libjpeg62-turbo-dev
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/

# Install extensions
RUN docker-php-ext-install \
  sockets \
  gd \
  exif \
  bcmath \
  pdo_mysql \
  pcntl \
  zip \
  pdo \
  ctype \
  fileinfo \
  xml \
  xsl \
  intl

# Clear cache
RUN apt-get clean \
  && rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- \
  --install-dir=/usr/local/bin --version=${COMPOSER_VERSION} --filename=composer && chmod +x /usr/local/bin/composer
RUN mkdir -p /.composer/cache/vcs && chmod -R 777 /.composer

# Node
RUN curl -fsSL https://deb.nodesource.com/setup_${NODE_VERSION} | bash -
RUN apt install -y nodejs
RUN mkdir /.npm && chmod -R 777 /.npm
RUN npm install --global cross-env

RUN rm /bin/sh && ln -s /bin/bash /bin/sh

# Fix tinker
RUN mkdir -p /.config/psysh && chmod -R 777 /.config

WORKDIR /var/www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
