<?php

namespace App\Controllers;

use App\Models\Livres;

class OeuvresController
{
    private $model;
    protected string $table;

    public function __construct()
    {
        $this->model = new Livres();
        $this->table = 'livres';
    }

    public function index()
    {
        $book = $this->model->readAll();
        require './Views/oeuvres.php';
    }
}
