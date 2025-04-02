FROM php:8.2-apache
RUN echo "ServerName localhost:80" >> /etc/apache2/apache2.conf
WORKDIR /var/www/html
COPY . .
