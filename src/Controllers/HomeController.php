<?php

namespace App\Controllers;

class HomeController 
{
    private $model;

    public function __construct()
    {
        
    }

    public function index()
    {
        require './Views/home.php';
    }
}
