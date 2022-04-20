<?php

namespace App\Controller;

class IndexController extends Controller
{
    function indexAction(): string
    {
        $parameters = [
            'loggedIn' => $_SESSION['loggedIn'] ?? false,
        ];
        return $this->twig->render('index.html.twig', $parameters);
    }
}