<?php

namespace App\Controllers;

use App\Models\Articles;

class ArticlesController
{
    private $model;
    protected $table;

    public function __construct()
    {
        $this->model = new Articles();
        $this->table = 'articles';
    }

    public function index()
    {
        $articles = $this->model->readAll();
        require './Views/articles.php';
    }
}
