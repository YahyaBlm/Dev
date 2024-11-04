<?php

namespace App\Controllers;

use App\Models\Articles;

class ArticlesController
{
    private $model;
    protected string $table;

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

    public function details($id)
    {
        $article = $this->model->readOnly($id);
        require './Views/article.php';
    }
}
