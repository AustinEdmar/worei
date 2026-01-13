FROM php:8-fpm-alpine

ARG UID
ARG GID

ENV UID=${UID}
ENV GID=${GID}

RUN mkdir -p /var/www/html

WORKDIR /var/www/html

# Instala dependências do sistema
RUN apk add --no-cache \
    $PHPIZE_DEPS \
    linux-headers \
    postgresql-dev \
    libpq \
    && docker-php-ext-install pdo pdo_mysql pdo_pgsql pgsql

# Instala o composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Remove grupo dialout (conflito com Mac)
RUN delgroup dialout

# Cria usuário laravel com UID e GID configuráveis
RUN addgroup -g ${GID} --system laravel && \
    adduser -G laravel --system -D -s /bin/sh -u ${UID} laravel

# Altera configurações do PHP-FPM para usar usuário laravel
RUN sed -i "s/user = www-data/user = laravel/g" /usr/local/etc/php-fpm.d/www.conf && \
    sed -i "s/group = www-data/group = laravel/g" /usr/local/etc/php-fpm.d/www.conf && \
    echo "php_admin_flag[log_errors] = on" >> /usr/local/etc/php-fpm.d/www.conf

# Instala e ativa Redis
RUN pecl install redis && docker-php-ext-enable redis

# Define o usuário padrão
USER laravel

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]
