FROM php:7.2-fpm

RUN apt-get update && apt-get install -y libpng-dev zlib1g-dev libwebp-dev libxpm-dev libjpeg62-turbo-dev libfreetype6-dev libmcrypt-dev libicu-dev g++ && apt-get clean
RUN pecl install mcrypt-1.0.3 && pecl install xdebug-2.6.0
RUN docker-php-ext-configure gd --with-gd --with-webp-dir --with-jpeg-dir --with-png-dir --with-zlib-dir --with-xpm-dir --with-freetype-dir
RUN docker-php-ext-install gd mysqli pdo_mysql mbstring zip intl
RUN docker-php-ext-enable mcrypt zip gd xdebug intl
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php && rm composer-setup.php && mv composer.phar /usr/local/bin/composer && chmod a+x /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
