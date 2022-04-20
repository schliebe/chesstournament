<?php

namespace App\Persistence;

interface Database
{
    /**
     * Return userId by the given username. If username does not exist return null
     *
     * @param string $username
     * @return int|null
     */
    public function getUserId(string $username): ?int;

    /**
     * Return hashed password of the given user. If user does not exist return null
     *
     * @param int $userId
     * @return string|null
     */
    public function getPasswordHash(int $userId): ?string;
}