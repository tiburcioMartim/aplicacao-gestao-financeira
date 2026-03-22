<?php
$envPath = __DIR__ . '/.env';
if (file_exists($envPath)) {
    $env = parse_ini_file($envPath);
    foreach ($env as $key => $value) {
        // Remove aspas simples se existirem (ex: 'db' vira db)
        $_ENV[$key] = trim($value, "'\"");
    }
} else {
    die("Erro: Arquivo .env não encontrado em " . $envPath);
}