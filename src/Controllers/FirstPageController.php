<?php

namespace App\Controllers;

class FirstPageController 
{
    private $model;

    public function __construct()
    {
        
    }

    public function index()
    {
        require './Views/firstPage.php';
    }
}
