<?php

namespace App\Controllers;

use App\Models\Comments;
use App\Models\Livres;

class BooksController
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
        $books = $this->model->readAll();
        require './Views/oeuvres.php';
    }

    public function details($id)
    {
        $book = $this->model->readOnly($id);
        $commentModel = new Comments;
        $comments = $commentModel->getComments($id);
        require './Views/oeuvre.php';
    }


}
