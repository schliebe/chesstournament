<?php

namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

use Pecee\SimpleRouter\SimpleRouter;
use App\Controller\IndexController;
use App\Controller\LoginController;

class Routes
{
    const INDEX = '/';
    const SEASON = '/season';
    const PLAYOFF = '/playoff';
    const LOGIN = '/login';
    const LOGOUT = '/logout';
}

SimpleRouter::get(Routes::INDEX, [IndexController::class, 'indexAction']);
SimpleRouter::form(Routes::LOGIN, [LoginController::class, 'loginAction']);
SimpleRouter::get(Routes::LOGOUT, [LoginController::class, 'logoutAction']);