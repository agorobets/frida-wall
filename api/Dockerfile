FROM php:7.1-fpm

ENV PATH $PATH:/root/.composer/vendor/bin

# PHP extensions come first, as they are less likely to change between Yii releases
RUN apt-get update \
    && apt-get -y install \
            git \
            build-essential \
            zlib1g-dev \
            libghc-postgresql-libpq-dev \
            libmcrypt-dev \
            libicu-dev \
            libcurl4-openssl-dev \
            apt-utils \
            tree \
            git libmagick++-dev \
            libimage-exiftool-perl \
        --no-install-recommends \

    # Install PHP extensions
    && docker-php-ext-configure pgsql -with-pgsql=/usr/include/postgresql/ \
	&& docker-php-ext-install pgsql pdo_pgsql \
	&& docker-php-ext-install intl \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install mcrypt \
    && docker-php-ext-install curl \
    && docker-php-ext-install opcache \
    && docker-php-ext-install zip \
    && docker-php-ext-install bcmath \

    && apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/* \

    # Fix write permissions with shared folders
    && usermod -u 1000 www-data \

    # Next composer and global composer package, as their versions may change from time to time
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer.phar

COPY . /var/www/html