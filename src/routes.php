<?php

namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

use Pecee\SimpleRouter\SimpleRouter;
use App\Controller\IndexController;

class Routes
{
    const INDEX = '/';
}

SimpleRouter::get(Routes::INDEX, [IndexController::class, 'indexAction']);