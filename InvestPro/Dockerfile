FROM php:8.2-apache

# Habilitar rewrite do Apache
RUN a2enmod rewrite

# Instalar dependências do PHP e do sistema
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libzip-dev \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    gnupg \
    && docker-php-ext-install pdo_mysql mbstring zip bcmath gd \
    && apt-get clean

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar Node.js e npm
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm@latest

# Definir diretório de trabalho
WORKDIR /var/www/html

# Copiar código da aplicação
COPY . .

# Ajustar DocumentRoot do Apache para public
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Permissões para Laravel
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache

# Instalar dependências PHP e JS
RUN composer install
RUN npm install
RUN npm run dev

# Expor porta
EXPOSE 80

# Comando para iniciar o Apache
CMD ["apache2-foreground"]
