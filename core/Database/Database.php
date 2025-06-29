<?php

namespace Core\Database;

use PDO;

class Database
{
    private static Database|null $instance = null;
    private PDO $connect;
    private \PDOStatement $stmt;

    private function __construct()
    {
    }

    public static function getInstance(): self
    {
        if (Database::$instance === null) {
            Database::$instance = new self();
        }

        return Database::$instance;
    }

    public function getConnect(array $dbConfig): self
    {
        $dsn = "mysql:host={$dbConfig['DB_HOST']};dbname={$dbConfig['DB_NAME']};charset={$dbConfig['CHARSET']}";
        try {
            $this->connect = new PDO($dsn, $dbConfig['DB_USER'], $dbConfig['DB_PASSWORD'], $dbConfig['OPTIONS']);
            return $this;
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
}