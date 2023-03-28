<?php

declare(strict_types = 1);

namespace App\Models;

use App\DB;

class RegisterUsers extends DB
{
    public function putUsersQuery(string $sql, string $username, string $email, string $password): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$username, $email, $password]);
        return $stmt->fetchAll();
    }

    public function getQueryResults(string $sql, string $email): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetchAll();
    }
}