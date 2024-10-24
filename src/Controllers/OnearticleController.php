<?php

namespace App\Controllers;

use App\Models\Articles;

class OnearticleController extends MainController
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Articles();
        $this->table = 'articles';
    }

    public function index()
    {
        // $articles = $this->model->readAll();
        require './Views/article.php';
    }
}
