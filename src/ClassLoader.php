<?php

namespace App;

use App\Persistence\Database;
use Pecee\SimpleRouter\Exceptions\ClassNotFoundHttpException;
use Twig\Environment;

class ClassLoader extends \Pecee\SimpleRouter\ClassLoader\ClassLoader
{
    private Database $db;
    private Environment $twig;

    public function __construct(Database $db, Environment $twig) {
        // Store dependencies for the containers
        $this->db  = $db;
        $this->twig = $twig;
    }

    /**
     * Load the given container with the needed dependencies
     *
     * @param string $class
     * @return mixed
     * @throws ClassNotFoundHttpException
     */
    public function loadClass(string $class)
    {
        if (class_exists($class) === false) {
            throw new ClassNotFoundHttpException($class, null, sprintf('Class "%s" does not exist', $class), 404, null);
        }

        return new $class($this->db, $this->twig);
    }
}