<?php

declare(strict_types = 1);

namespace App;

use PDO;

class DB
{
    protected PDO $pdo;
    public function __construct()
    {
        $options = [
            PDO::ATTR_EMULATE_PREPARES   => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
        $this->pdo = new PDO(
            'mysql:dbname=' . $_ENV['DB_DATABASE'] . ';host=' . $_ENV['DB_HOST'],
            $_ENV['DB_USER'],
            $_ENV['DB_PASS'],
            $options
            );
        } catch (\PDOException $e){
            die('Connection failed:' . $e->getMessage());
        }
    
    }
}

