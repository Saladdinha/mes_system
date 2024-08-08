# use PHP 8.3
FROM php:8.3-fpm

RUN usermod -u 1000 www-data
# Install common php extension dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    zlib1g-dev \
    libzip-dev \
    unzip \
    nginx \
    supervisor \
    npm \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install zip \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Set the working directory
COPY . /var/www/html
WORKDIR /var/www/html
COPY --chown=www-data . .

# install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set high access to laravel storage
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap

# Set the default command to run image
ENTRYPOINT [ "./docker/entrypoints/dev.sh" ]