<?php

namespace App\Controllers;

use App\Models\Comments;

class CommentController extends MainController
{
    private $model;

    public function __construct()
    {
        $this->model = new Comments();
    }

    public function index()
    {
        $this->islogged();
        $this->isLevel(50);
        $comments = $this->model->readAll();
        require 'Admin/Views/Comments/listComments.php';
    }

    public function show($id)
    {
        $this->islogged();
        $this->isLevel(50);
        $comment = $this->model->readOnly($id);
        require 'Admin/Views/Comments/showComment.php';
    }

    public function delete($id)
    {
        $this->islogged();
        $this->admin();
        $delete = "Voulez-vous supprimer ce commentaire ?";

        if (isset($_POST['yes'])) {
            $this->model->delete($id);

            header('Location: /comment/index');
            exit();
        } else if (isset($_POST['no'])) {
            header('Location: /comment/index');
            exit();
        }
        $root = "/Comment";
        require 'Admin/Views/delete.php';
    }

    public function insertComment($idBook)
    {
        $this->islogged();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_SESSION['auth'])) {
                $comment = filter_var($_POST["comment"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);

                $infos = [
                    'commentaire' => $comment,
                    'id_livre' => $idBook,
                    'id_user' => $_SESSION['auth']->id
                ];

                $this->model->create($infos);

                header('Location: /books/details/' . $idBook);
            } else {
                header('location: /user/login');
            }
        } else {
            require '/Views/oeuvre.php';
        }
    }
}
