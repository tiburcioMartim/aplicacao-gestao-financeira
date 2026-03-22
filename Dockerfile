# É a base de tudo (Todo dockerfile deve começar com este comando)
FROM php:8.2-apache

# A pasta de trabalho (define em qual pasta o comandos seguintes serão executados)
WORKDIR /var/www/html

# Instalação de dependencias (Este comando executa ordens no terminal do container durante a construção da imagem)
RUN docker-php-ext-install mysqli pdo_mysql

# Copia os arquivos da pasta atual para o container
COPY . .

# Expõe a porta 80
EXPOSE 80

# Comando de partida (O que o container deve fazer quando iniciar)
CMD ["apache2-foreground"]



