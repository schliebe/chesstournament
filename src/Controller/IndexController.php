<?php

namespace App\Controller;

class IndexController extends Controller
{
    function indexAction(): string
    {
        $parameters = [

        ];
        return $this->twig->render('index.html.twig', $parameters);
    }
}