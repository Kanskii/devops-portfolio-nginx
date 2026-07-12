FROM php:8.4-fpm

# Жұмыс папкасын docker-compose-пен бірдей етеміз
WORKDIR /var/www/html

COPY . .

# PHP-FPM әдетте 9000 портта жұмыс істейді
EXPOSE 9000

CMD ["php-fpm"]
