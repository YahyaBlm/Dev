<?php

namespace App\Controllers;

use App\Models\Livres;

class BookController extends MainController
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Livres();
        $this->table = 'livres';
    }

    public function index()
    {
        $this->isLevel(50);
        $books = $this->model->readAll();
        require 'Admin/Views/Oeuvres/listBooks.php';
    }

    public function create()
    {
        $this->isLevel(50);
        $bookResume = "";
        $nameDir = 'BookImages';
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookResume = $_POST['resume'];
            $infos = [
                'livre_titre' => $_POST['title'],
                'livre_couverture' => $_FILES['cover'],
                'livre_resume' => $bookResume,
                'livre_linkSale' => $_POST['link']
            ];

            $id = $this->model->create($infos);
            $this->uploadImage($id, $nameDir, 'livre_couverture');

            header('Location: /Book');
        } else {
            $pageTitle = "Ajouter une nouvelle oeuvre";
            $buttonValue = "Ajouter";
            require 'Admin/Views/Oeuvres/insertEditBook.php';
        }
    }

    public function update($id)
    {
        $this->isLevel(50);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bookResume = $_POST['resume'];
            $nameDir = 'BookImages';
            $infos = [
                'livre_titre' => $_POST['title'],
                'livre_resume' => $bookResume,
                'livre_linkSale' => $_POST['link']
            ];
            
            $this->model->update($id, $infos);

            if ($_FILES['cover']) {
                $this->uploadImage($id, $nameDir, 'livre_couverture');
            }

            header('Location: /book/index');
        }
        $book = $this->model->readOnly($id);
        $bookResume = $book->livre_resume;
        $pageTitle = "Vue de l'oeuvre";
        $buttonValue = "Modifier";
        require 'Admin/Views/Oeuvres/insertEditBook.php';
    }

    public function delete($id)
    {
        $this->admin();
        $book = $this->model->readOnly($id);
        $delete = "Voulez-vous supprimer l'oeuvre \"" . ucfirst($book->livre_titre) . "\" ?";

        if (isset($_POST['yes'])) {
            $this->model->delete($id);

            header('Location: /book/index');
            exit();
        } else if (isset($_POST['no'])) {
            header('Location: /book/index');
            exit();
        }
        $root = "/Book";
        require 'Admin/Views/delete.php';
    }
}
