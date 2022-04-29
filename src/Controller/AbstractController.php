<?php

namespace App\Controller;

use App\Persistence\Database;
use Twig\Environment;

abstract class AbstractController
{
    public Database    $db;
    public Environment $twig;

    function __construct($db, $twig) {
        $this->db   = $db;
        $this->twig = $twig;
    }

    /**
     * Return if the user is logged in
     *
     * @return bool
     */
    function isLoggedIn(): bool {
        return $_SESSION['loggedIn'] ?? false;
    }

    /**
     * Return the userId of the user, 0 if not logged in
     *
     * @return int
     */
    function getUserId(): int {
        if ($this->isLoggedIn()) {
            return $_SESSION['userId'] ?? 0;
        } else {
            return 0;
        }
    }


    /**
     * Return the username of the user, null if not logged in
     *
     * @return string|null
     */
    function getUsername(): string|null {
        if ($this->isLoggedIn()) {
            return $_SESSION['username'] ?? null;
        } else {
            return null;
        }
    }
}