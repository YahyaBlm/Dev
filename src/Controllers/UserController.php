<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\VerifBack;
use App\Models\Verifications;

class UserController extends MainController
{
    private $model;
    private $verifications;
    private $VerifBack;

    public function __construct()
    {
        $this->model = new Users();
        $this->VerifBack = new VerifBack();
        $this->verifications = new Verifications;
    }

    public function index()
    {
        $this->isLevel(50);
        $users = $this->model->readAll();
        require 'Admin/Views/Users/listUsers.php';
    }

    public function create()
    {
        $this->isLevel(50);
        $firstname = $this->VerifBack->verifUserName();
        $lastname = $this->VerifBack->verifUserLastname();
        $email = $this->VerifBack->verifUserMailInsert();
        $password = $this->VerifBack->verifPassword();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $infos = [
                'user_nom' => $lastname,
                'user_prenom' => $firstname,
                'user_email' => $email,
                'id_role' => $_POST['role'],
                'user_password' => $hashedPassword
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
        $this->isLevel(50);
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
        $this->admin();
        $user = $this->model->readOnly($id);
        $delete = "Voulez-vous supprimer \"" . $user->user_prenom . " " . $user->user_nom . "\" ?";

        if (isset($_POST['yes'])) {
            $this->model->delete($id);

            header('Location: /user/index');
            exit();
        } else if (isset($_POST['no'])) {
            header('Location: /user/index');
            exit();
        }
        $root = "/User";
        require 'Admin/Views/delete.php';
    }

    public function login()
    {
        if (isset($_SESSION['auth'])) {
            header('location: /Books');
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $user = $this->verifications->login();
            if ($user) {
                $_SESSION['auth'] = $user;
                header('location: /Books');
            }
        }
        require './Views/profile.php';
    }

    public function register()
    {
        $firstname = $this->VerifBack->verifUserName();
        $lastname = $this->VerifBack->verifUserLastname();
        $email = $this->VerifBack->verifUserMailInsert();
        $password = $this->VerifBack->verifPassword();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $infos = [
                'user_nom' => $lastname,
                'user_prenom' => $firstname,
                'user_email' => $email,
                'id_role' => '1',
                'user_password' => $hashedPassword
            ];

            $this->model->create($infos);

            header('Location: /user/login');
        }
        require './Views/inscription.php';
    }

    public function logout()
    {
        unset($_SESSION['auth']);
        header('Location: /home');
    }

}
