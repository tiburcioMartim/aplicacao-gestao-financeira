<?php 
# 1. Iniciando a sessão
if (session_status() == PHP_SESSION_NONE) {
    session_start();
    echo "<script>console.log('Feedback: Sessão iniciada com sucesso!');</script>";
} else {
    echo "<script>console.log('Feedback: Sessão já iniciada!');</script>";
}

# 2. Carregando .env
require_once __DIR__ . "/config/env.php";

# 3. Incluindo a classe de conexão
require_once __DIR__ . "/config/conn.php";

# Criando a conexão
$conexao = new Conn();
$conn = $conexao->getConnection();