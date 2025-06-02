FROM php:8.2-apache

# Copia os arquivos para o diretório padrão do Apache
COPY . /var/www/html/

# Ajusta permissões
RUN chown -R www-data:www-data /var/www/html

# Ativa mod_rewrite (opcional para URLs amigáveis)
RUN a2enmod rewrite
