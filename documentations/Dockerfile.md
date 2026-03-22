# 🐳 Tutorial de Docker para Gestão Financeira

Este documento serve como um guia de aprendizado para a configuração do ambiente Docker deste projeto PHP + MySQL.

---

## 🏗️ 1. O Dockerfile

O [Dockerfile](cci:7://file:///c:/Users/Martim%20Tiburcio/Documents/PROJETO_gestao-financeira/Dockerfile:0:0-0:0) é como uma **receita de bolo**. Ele contém as instruções necessárias para o Docker "cozinhar" uma imagem (um sistema completo) onde seu código vai rodar.

### Passo a Passo da Configuração:

#### 🟢 01. `FROM` (A Base)
Define qual sistema operacional e softwares já virão pré-instalados.
*   **Comando:** `FROM php:8.2-apache`
*   **O que faz:** Escolhemos a imagem oficial do PHP v8.2 com o servidor web Apache. Isso nos poupa de ter que instalar o Apache manualmente.

#### 📂 02. `WORKDIR` (A Pasta de Trabalho)
Define o local dentro do container onde os arquivos serão colocados e os comandos serão executados.
*   **Comando:** `WORKDIR /var/www/html`
*   **O que faz:** Entra na pasta padrão do Apache Linux. É como dar um `cd` no terminal direto para a pasta do site.

#### 🛠️ 03. `RUN` (Instalação de Ferramentas)
Executa comandos para instalar dependências extras enquanto a imagem está sendo construída.
*   **Comando:** `RUN docker-php-ext-install mysqli pdo_mysql`
*   **O que faz:** As imagens PHP são "limpas". Este passo é vital para instalar os drivers necessários para o PHP conseguir conversar com o banco de dados MySQL.

#### 📦 04. `COPY` (Transferência de Arquivos)
Leva seus arquivos do computador (Windows) para dentro do container (Linux).
*   **Comando:** `COPY . .`
*   **O que faz:** O primeiro ponto `.` é a origem (seu PC) e o segundo ponto `.` é o destino (o `WORKDIR` no container). Copia tudo: [index.php](cci:7://file:///c:/Users/Martim%20Tiburcio/Documents/PROJETO_gestao-financeira/index.php:0:0-0:0), pastas `config/`, `models/`, etc.

#### 🚪 05. `EXPOSE` (Porta de Saída)
Documenta qual porta o container está usando para oferecer o serviço.
*   **Comando:** `EXPOSE 80`
*   **O que faz:** Indica que o container "fala" pela porta 80. Lembre-se: isso não abre o site no Windows ainda, quem fará isso é o Docker Compose.

#### 🚀 06. `CMD` (A Partida)
Define qual comando o container deve rodar assim que ele for ligado ("start").
*   **Comando:** `CMD ["apache2-foreground"]`
*   **O que faz:** Inicia o servidor Apache em modo foreground (plano de frente). Se este processo parar, o container entende que terminou seu trabalho e desliga.

---

*Este tutorial será atualizado conforme avançarmos para o Docker Compose!*
