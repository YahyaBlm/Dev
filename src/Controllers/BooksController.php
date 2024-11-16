<?php

namespace App\Controllers;

use App\Models\Comments;
use App\Models\Images;
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

    public function getImages($id)
    {
        $ImagesModel = new Images;
        $Images = $ImagesModel->findByBook($id);
        // tableau d'objet que je transforme en json pour pouvoir l'envoyer au JS
        echo json_encode($Images);
    }
}
