<?php
namespace App\Controller;

class IndexController {
    private $loader = null;
    private $twig   = null;

    function __construct() {
        $this->loader = new \Twig\Loader\FilesystemLoader('../templates');
        $this->twig   = new \Twig\Environment($this->loader);
    }

    function indexAction(): string {
        $parameters = [

        ];
        return $this->twig->render('index.html.twig', $parameters);
    }
}