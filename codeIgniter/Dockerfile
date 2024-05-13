# Use a imagem oficial do PHP
FROM php:7.2-apache

# Atualize os pacotes do sistema operacional
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    unzip

# Configure o timezone
ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Copie o código do projeto para a imagem
COPY . /var/www/html

# Instale as dependências do Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-interaction --no-progress --prefer-dist

# Instale as dependências do Node.js
RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -
RUN apt-get install -y nodejs

# Instale as dependências do Vue.js
WORKDIR /var/www/html/assets
RUN npm install

# Configure o Apache para usar o PHP e o Vue.js
RUN a2enmod rewrite expires
RUN sed -i "s/AllowOverride None/AllowOverride All/g" /etc/apache2/apache2.conf