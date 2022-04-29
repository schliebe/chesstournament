<?php

namespace App\Controller;

class IndexController extends AbstractController
{
    function indexAction(): string
    {
        $parameters = [
            'loggedIn' => $this->isLoggedIn(),
        ];
        return $this->twig->render('index.html.twig', $parameters);
    }
}