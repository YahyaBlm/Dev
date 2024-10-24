<?php

namespace App\Controllers;

class PartenairesController extends MainController
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        // $this->model = new Articles();
        // $this->table = 'articles';
    }

    public function index()
    {
        // $articles = $this->model->readAll();
        require './Views/partenaires.php';
    }
}
