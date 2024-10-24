<?php

namespace App\Controllers;

class InscriptionController 
{
    private $model;

    public function __construct()
    {
        
    }

    public function index()
    {
        require './Views/inscription.php';
    }
}
