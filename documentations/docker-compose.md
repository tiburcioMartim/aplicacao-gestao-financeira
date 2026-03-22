# Tutorial: Entendendo o Docker Compose

Este documento explica detalhadamente o funcionamento de cada linha do arquivo `docker-compose.yml` do projeto de Gestão Financeira.

## Estrutura Geral

O Docker Compose utiliza o formato **YAML**, onde a indentação (espaços) é fundamental para definir a hierarquia das configurações.

---

### 1. Versão e Serviços Base
- **`version: '3.8'`**: Define a versão da sintaxe usada. A 3.8 é uma das mais estáveis e completas.
- **`services`**: É aqui que listamos todos os containers que compõem nosso sistema.

---

### 2. Serviço da Aplicação (`app`)
Este é o container que rodará o seu código PHP com Apache.

- **`build: .`**: Instrução para construir a imagem. O `.` indica que o Docker deve procurar o arquivo `Dockerfile` na mesma pasta do `docker-compose.yml`.
- **`container_name: app_gestao`**: Define o nome fixo do container, facilitando o gerenciamento no terminal.
- **`ports: ["8080:80"]`**: Mapeia a porta **8080** do seu Windows para a porta **80** interna do container.
- **`volumes: [".:/var/www/html"]`**: Sincroniza seus arquivos locais com o container. Mudou no VS Code, mudou no site!
- **`depends_on: ["db"]`**: Garante ordem de inicialização: o banco de dados sobe primeiro que o PHP.
- **`networks: ["finance_net"]`**: Conecta o PHP à rede interna para falar com o banco.

---

### 3. Serviço do Banco de Dados (`db`)
Este container roda o MySQL 8.0.

- **`image: mysql:8.0`**: Usa uma imagem oficial pronta do Docker Hub.
- **`restart: always`**: Se o container travar ou o PC reiniciar, o Docker tentará ligá-lo novamente de forma automática.
- **`environment`**: Define as configurações iniciais do banco:
  - `MYSQL_ROOT_PASSWORD`: Define a senha do administrador como `root`.
  - `MYSQL_DATABASE`: Cria automaticamente o banco `gestao_financeira`.
- **`ports: ["3306:3306"]`**: Permite que ferramentas como MySQL Workbench ou DBeaver acessem o banco diretamente do Windows.
- **`volumes: ["db_data:/var/lib/mysql"]`**: Aqui acontece a **persistência**. Os dados do MySQL ficam salvos no volume `db_data` no seu disco, então você não perde nada se o container for deletado.

---

### 4. Infraestrutura (Redes e Volumes)

- **`networks: finance_net`**: Cria uma rede virtual privada. Os containers dentro desta rede podem se comunicar usando apenas os seus nomes (o PHP chama o host `db` em vez de um IP).
- **`volumes: db_data`**: Declara o volume de armazenamento persistente que o MySQL utiliza.

---

## Comandos Úteis

- **Subir tudo**: `docker compose up -d`
- **Parar tudo**: `docker compose stop`
- **Remover tudo (mantendo dados)**: `docker compose down`
- **Remover tudo (APAGANDO DADOS)**: `docker compose down -v`
- **Ver logs em tempo real**: `docker compose logs -f`
- **Ver status dos containers**: `docker compose ps`
- **Reconstruir as imagens**: `docker compose build`
- **Subir reconstruindo**: `docker compose up -d --build`
- **Reiniciar um serviço**: `docker compose restart app`
- **Entrar no terminal do container**: `docker compose exec app bash`
- **Rodar comando no banco**: `docker compose exec db mysql -u root -p`