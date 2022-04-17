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
}