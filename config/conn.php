<?php
class Conn {
    private $host;
    private $user;
    private $pass;
    private $dbname;
    private $mysqli = null;

    public function __construct() {
        $this->host   = $_ENV['HOSTNAME'] ?? 'localhost';
        $this->user   = $_ENV['USERNAME'] ?? 'root';
        $this->pass   = $_ENV['PASSWORD'] ?? '';
        $this->dbname = $_ENV['DATABASE'] ?? '';

        try {
            // Utilizando o driver MySQLi (Orientado a Objetos)
            $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

            // Verifica se houve erro na conexão
            if ($this->mysqli->connect_error) {
                die("Class Conn: Erro de conexão MySQLi: " . $this->mysqli->connect_error);
            }
            
            // Define o charset UTF-8
            $this->mysqli->set_charset("utf8mb4");

        } catch (Exception $e) {
            die("Class Conn: Erro inesperado: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->mysqli;
    }
}   
?>