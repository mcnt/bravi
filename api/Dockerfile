
FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    nginx \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    git

RUN docker-php-ext-install pdo pdo_pgsql pgsql zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY nginx/nginx.conf /etc/nginx/sites-available/default

WORKDIR /var/www/html

COPY . .

EXPOSE 80

CMD service nginx start && php-fpm
