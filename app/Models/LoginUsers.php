<?php

declare(strict_types = 1);

namespace App\Models;

use App\DB;

class LoginUsers extends DB
{
    public function getQueryResults(string $sql, string $email, string $password): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email, $password]);
        return $stmt->fetchAll();
    }
}