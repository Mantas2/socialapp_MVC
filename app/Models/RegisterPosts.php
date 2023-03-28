<?php

declare(strict_types = 1);

namespace App\Models;

use App\DB;

class RegisterPosts extends DB
{
    public function putQueryResults(string $sql, int $user_id, string $content): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user_id, $content]);
        return $stmt->fetchAll();
    }

    public function getQueryResults(string $sql): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}