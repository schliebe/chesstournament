<?php

namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

use Pecee\SimpleRouter\SimpleRouter;
use App\Controller\IndexController;

class Routes
{
    const INDEX = '/';
    const SEASON = '/season';
    const PLAYOFF = '/playoff';
    const LOGIN = '/login';
}

SimpleRouter::get(Routes::INDEX, [IndexController::class, 'indexAction']);