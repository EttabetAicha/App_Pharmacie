<?php

namespace Config;

use Dotenv\Dotenv;
use PDO;
use PDOException;

class DbConnection
{
    private static $instance;
    private $pdo;

    private function __construct()
    {
        $this->loadDotenv();
        $this->createConnection();
    }

    private function loadDotenv()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();
    }

    private function createConnection()
    {
        $host = $_ENV['DB_HOST'] ?? 'localhost';
        $dbname = $_ENV['DB_NAME'] ?? '';
        $user = $_ENV['DB_USER'] ?? '';
        $password = $_ENV['DB_PASSWORD'] ?? '';

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getConnection()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }

        return self::$instance->pdo;
    }
}
