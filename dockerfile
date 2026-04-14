FROM php:8.2-apache

# Extensions PHP nécessaires
RUN docker-php-ext-install pdo pdo_mysql

# Activer rewrite
RUN a2enmod rewrite

# Définir le dossier public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Copier le projet
COPY . /var/www/html

# Permissions
RUN chown -R www-data:www-data /var/www/html

