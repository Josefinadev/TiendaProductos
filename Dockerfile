#Usar una imagen base de hpt

FROM php:8.0-apache

#Instalar las dependencias necesarias para hpt
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql pgsql


#Cpiar el código de hpt al contenedor
COPY . /var/www/html/

#Expiendo el puerto 80
EXPOSE 80