FROM php:7.0-apache

RUN apt-get update && \
    apt-get clean
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN docker-php-ext-install mysqli
COPY index.php /var/www/html/
COPY db.ini /var/www/html/
