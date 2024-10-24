<?php

namespace App\Controllers;

use App\Models\Articles;

class OnearticleController 
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
        // $article = $this->model->readOnly($id);
        require './Views/article.php';
    }
}
