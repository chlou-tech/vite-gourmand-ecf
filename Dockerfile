FROM php:8.2-apache

# Installer extensions
RUN docker-php-ext-install pdo pdo_mysql

# Apache modules
RUN a2enmod rewrite

# 💥 FIX TOTAL MPM
RUN a2dismod mpm_event || true
RUN a2dismod mpm_worker || true
RUN a2enmod mpm_prefork

# Définir /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Copier projet
COPY . /var/www/html

# Permissions
RUN chown -R www-data:www-data /var/www/html

