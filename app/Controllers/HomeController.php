<?php

namespace App\Controllers;

use duncan3dc\Laravel\BladeInstance;

class HomeController
{
    protected $blade;

    public function __construct(BladeInstance $blade)
    {
        $this->blade = $blade;
    }

    public function index()
    {
        // echo 'hii';
        echo $this->blade->render('home', [
            'name' => 'Yahya'
        ]);
    }
    public function about(){
        echo 'about';
    }
}