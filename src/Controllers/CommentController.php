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
        $comments = $this->model->readAll();
        require 'Admin/Views/Comments/listComments.php';
    }

    public function show($id)
    {
        $comment = $this->model->readOnly($id);
        require 'Admin/Views/Comments/showComment.php';
    }

    public function delete($id)
    {
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
}
