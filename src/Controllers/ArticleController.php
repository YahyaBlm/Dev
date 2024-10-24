<?php

namespace App\Controllers;

use App\Models\Articles;

class ArticleController extends MainController
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
        $articles = $this->model->readAll();
        require 'Admin/Views/Articles/listArticles.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nameDir = 'ArticleImages';
            $infos = [
                'article_titre' => $_POST['title'],
                'article_text' => $_POST['article'],
                'article_image' => $_FILES['cover'],
                'id_user' => '1'
            ];

            $id = $this->model->create($infos);
            $this->uploadImage($id, $nameDir, 'article_image');

            header('Location: /article');
        } else {
            $pageTitle = "Ajouter un nouvel article";
            $buttonValue = "Ajouter";
            require 'Admin/Views/Articles/insertEditArticle.php';
        }
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $articleText = $_POST['article'];
            $nameDir = "ArticleImages";
            $infos = [
                'article_titre' => $_POST['title'],
                'article_text' => $articleText
            ];

            $this->model->update($id, $infos);

            if ($_FILES['cover']) {
                $this->uploadImage($id, $nameDir, 'article_image');
            }

            header('Location: /article');
        }
        $pageTitle = "Vue de l'article";
        $article = $this->model->readOnly($id);
        $articleText = $article->article_text;
        $buttonValue = "Modifier";
        require 'Admin/Views/Articles/insertEditArticle.php';
    }

    public function delete($id)
    {
        $article = $this->model->readOnly($id);
        $delete = "Voulez-vous supprimer l'article \"" . ucfirst($article->article_titre) . "\" ?";

        if (isset($_POST['yes'])) {
            $this->model->delete($id);

            header('Location: /article/index');
            exit();
        } else if (isset($_POST['no'])) {
            header('Location: /article/index');
            exit();
        }
        $root = "/Article";
        require 'Admin/Views/delete.php';
    }
}
