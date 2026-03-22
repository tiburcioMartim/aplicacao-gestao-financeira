<?php
# 1. Iniciando a sessão e Autoloader
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/vendor/autoload.php';

# 2. Carregando .env (via phpdotenv)
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/config');
$dotenv->load();

# 3. Incluindo a classe de conexão
require_once __DIR__ . "/config/conn.php";

# Criando a conexão
$conexao = new Conn();
$conn = $conexao->getConnection();