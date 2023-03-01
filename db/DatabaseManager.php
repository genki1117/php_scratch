<?php

class DatabaseManager 
{
    /** @var string $db_user */
    private string $db_user;

    /** @var string $db_pass */
    private string $db_pass;

    /** @var string $dsn */
    private string $dsn;

    public function __construct()
    {
        $this->db_user = 'root';
        $this->db_pass = '';
        $this->dsn = 'mysql:host=127.0.0.1;dbname=code_php_db;charset=utf8mb4';
    }

    public function getPdo()
    {
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];
        $pdo = new PDO($this->dsn, $this->db_user, $this->db_pass, $options);
        return $pdo;
    }
}