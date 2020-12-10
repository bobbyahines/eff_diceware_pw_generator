FROM library/composer:latest AS composer-stage
WORKDIR /app
COPY composer.json .
RUN composer install --dev

FROM library/php:7.4 AS php-stage
WORKDIR /srv
COPY . .
COPY --from=composer-stage /app/vendor ./vendor

CMD php run.php