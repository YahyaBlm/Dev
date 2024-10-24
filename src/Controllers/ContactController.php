<?php

namespace App\Controllers;

class ContactController 
{
    private $model;

    public function __construct()
    {
        // $this->model = new ();
    }

    public function index()
    {
        require './Views/contact.php';
    }
}
