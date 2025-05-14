<?php

namespace Database;

use PDO;
use PDOException;

class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $db_name = "projeto-vida";

    public $pdo;

    public function getConnection()
    {
        $this->pdo = null;

        try {
            $this->pdo = new PDO("mysql:host=" . $this->servername . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->pdo->exec("set names utf8");
        } catch (PDOException $exception) {
            // Logar o erro
            error_log("Connection error: " . $exception->getMessage(), 3, '/path/to/logs/error.log');
            // Exibir uma mensagem genérica
            echo "Ocorreu um erro ao conectar ao banco de dados. Tente novamente mais tarde.";
        }

        return $this->pdo;
    }
}