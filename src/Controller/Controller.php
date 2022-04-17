<?php

namespace App\Controller;

use App\Persistence\Database;
use Twig\Environment;

abstract class Controller
{
    public Database    $db;
    public Environment $twig;

    function __construct($db, $twig) {
        $this->db   = $db;
        $this->twig = $twig;
    }
}