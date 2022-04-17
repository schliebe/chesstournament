<?php
require_once __DIR__ . '/../vendor/autoload.php';
require_once '../src/routes.php';

use Pecee\SimpleRouter\SimpleRouter;

// Initiate dependencies
try {
    $db = new \App\Persistence\SQLiteDatabase();
    $twig = new \Twig\Environment(new \Twig\Loader\FilesystemLoader('../templates'));
} catch (Throwable $e) {
    dump($e);
    exit;
}

// Pass dependencies to containers
SimpleRouter::setCustomClassLoader(new \App\ClassLoader($db, $twig));

// Start routing
SimpleRouter::start();