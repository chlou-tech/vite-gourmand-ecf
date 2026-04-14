FROM php:8.2-cli

# Extensions PHP
RUN docker-php-ext-install pdo pdo_mysql

# Copier le projet
COPY . /app

WORKDIR /app/public

# Lancer serveur PHP
CMD ["php", "-S", "0.0.0.0:80"]
