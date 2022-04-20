<?php

namespace App\Persistence;

use PDO;
use PDOException;

class SQLiteDatabase implements Database
{
    private string $path = '../db.db';
    private PDO $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO('sqlite:' . $this->path);
        } catch (PDOException $e) {
            dump($e);
            throw $e;
        }
    }

    public function getUserId(string $username): ?int
    {
        $sql = '
            SELECT user_id
            FROM User
            WHERE username = :username
        ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username' => $username]);
        $result = $stmt->fetch();
        return $result['user_id'] ?? null;
    }

    public function getPasswordHash(int $userId): ?string
    {
        $sql = '
            SELECT password
            FROM User
            WHERE user_id = :user_id
        ';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['user_id' => $userId]);
        $result = $stmt->fetch();
        return $result['password'] ?? null;
    }
}