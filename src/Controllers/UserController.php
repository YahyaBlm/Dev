<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\VerifBack;

class UserController extends MainController
{
    private $model;
    private $VerifBack;

    public function __construct()
    {
        $this->model = new Users();
        $this->VerifBack = new VerifBack();
    }

    public function index()
    {
        $users = $this->model->readAll();
        require 'Admin/Views/Users/listUsers.php';
    }

    public function create()
    {
        $firstname = $this->VerifBack->verifUserName();
        $lastname = $this->VerifBack->verifUserLastname();
        $email = $this->VerifBack->verifUserMailInsert();
        $password = $this->VerifBack->verifPassword();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $infos = [
                'user_nom' => $lastname,
                'user_prenom' => $firstname,
                'user_email' => $email,
                'id_role' => $_POST['role'],
                'user_password' => $password
            ];

            $this->model->create($infos);

            header('Location: /user/index');
        } else {
            $roles = $this->model->getRolesNames();
            $pageTitle = "Ajouter un utilisateur";
            $buttonValue = "Ajouter";
            require 'Admin/Views/Users/insertEditUser.php';
        }
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $firstname = $this->VerifBack->verifUserName();
            $lastname = $this->VerifBack->verifUserLastname();
            $email = $this->VerifBack->verifUserMailUpdate();
            $infos = [
                'user_nom' => $lastname,
                'user_prenom' => $firstname,
                'user_email' => $email,
                'id_role' => $_POST['role']
            ];

            $this->model->update($id, $infos);

            // header('Location: Admin/Views/Users/listUsers.php');
            header('Location: /user/index');
        }

        $user = $this->model->readOnly($id);
        $roles = $this->model->getRolesNames();
        $pageTitle = "Vue de l'utilisateur";
        $buttonValue = "Modifier";
        require 'Admin/Views/Users/insertEditUser.php';
    }

    public function delete($id)
    {
        $user = $this->model->readOnly($id);
        // $delete = "Voulez-vous supprimer " . $user->user_prenom . " " . $user->user_nom . " ?";
        $delete = "Voulez-vous supprimer \"" . $user->user_prenom . " " . $user->user_nom . "\" ?";

        if (isset($_POST['yes'])) {
            $this->model->delete($id);

            // header('Location: Admin/Views/Users/listUsers.php');
            header('Location: /user/index');
            exit();
        } else if (isset($_POST['no'])) {
            // header('Location: Admin/Views/Users/listUsers.php');
            header('Location: /user/index');
            exit();
        }
        $root = "/User";
        require 'Admin/Views/delete.php';
    }
}
