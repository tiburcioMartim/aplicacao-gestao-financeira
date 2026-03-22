<?php require_once 'bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestão Financeira - Teste</title>
    <!-- Favicon Genérico (Emoji Dinâmico) -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>💰</text></svg>">
</head>
<body>
    <h1>Teste de Conexão Centralizada</h1>
    <?php
    // O $conn e a $_ENV já vem do bootstrap.php
    if (isset($conn) && !$conn->connect_error) {
        echo "<p style='color: green;'>✅ Sucesso! Conectado ao banco: <strong>" . ($_SERVER['DB_NAME'] ?? '---') . "</strong></p>";
        echo "<ul>";
        echo "<li>Host: " . ($_SERVER['DB_HOST'] ?? '---') . "</li>";
        echo "<li>Usuário: " . ($_SERVER['DB_USER'] ?? '---') . "</li>";
        echo "</ul>";
    } else {
        echo "<p style='color: red;'>❌ Erro ao conectar!</p>";
        if (isset($conn)) echo "<p>Detalhe: " . $conn->connect_error . "</p>";
    }
    ?>
</body>
</html>