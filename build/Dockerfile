FROM "yiisoftware/yii2-php:7.1-apache"

# Variables de ambiente de Yii2
ENV DB_DATABASE=fei2020
ENV DB_PASSWORD=fei2020
ENV DB_HOST=db
ENV PRODUCCION=0
ENV PHP_ENABLE_XDEBUG=1

COPY app/ /app

COPY apache2-foreground /usr/local/bin/apache2-foreground
RUN chmod 777 /usr/local/bin/apache2-foreground

RUN composer global require "fxp/composer-asset-plugin:^1.4.1"

RUN composer update

RUN mkdir /app/runtime/cache && chown -R www-data: /app
