# Utilisez une image officielle de PHP en tant qu'image de base
FROM php:8.2-fpm

# Installation des dépendances nécessaires
RUN apt-get update && apt-get install -y \
    	git \
		unzip \
		libicu-dev \
		libpq-dev \
		libzip-dev \
		&& docker-php-ext-install intl pdo_pgsql zip

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install \
    pdo_mysql \
    intl \
    zip

# Composer - Installé globalement
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Répertoire de travail
WORKDIR /var/www/dev/sandbox

# Copie des fichiers de l'application dans le conteneur
COPY . .

# Installer les dépendances de Symfony avec Composer
RUN composer install --no-scripts --no-interaction

# Définir les autorisations nécessaires
RUN chown -R www-data:www-data /var/www/dev/sandbox

# Exposer le port 9000 pour la communication avec Nginx
EXPOSE 9000

# Commande pour démarrer le serveur PHP-FPM
CMD ["php-fpm"]
