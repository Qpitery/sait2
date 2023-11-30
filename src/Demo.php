<?php
declare(strict_types=1);
namespace Controllers;
class Demo{
    public function index()
    {
        echo 'home';

    }
    public function page()
    {
        echo 'page';
    }
    public function view($id)
    {
        echo $id;
    }
}