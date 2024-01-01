<?php

class DatabaseConnection {
    private static $instance;
    private $pdo;

    private function __construct() {
        $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../'); 
        $dotenv->load();

        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getConnection() {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance->pdo;
    }
}
