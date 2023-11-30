<?php


namespace App;


class BackEndView
{
    public $loader;
    public $twig;

    public function __construct()
    {
        $this->loader = new \Twig\Loader\FilesystemLoader('template/backend/');
        $this->twig = new \Twig\Environment($this->loader, [
            //'cache' => '/path/to/compilation_cache',
        ]);
    }
}