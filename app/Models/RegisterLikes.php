<?php

declare(strict_types = 1);

namespace App\Models;

use App\DB;

class RegisterLikes extends DB
{
    public function putQueryResults(string $sql, int $user_id, int $post_id): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$user_id, $post_id]);
        return $stmt->fetchAll();
    }

    public function getQueryResults(string $sql, int $post_id): array
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$post_id]);
        return $stmt->fetchAll();
    }
}