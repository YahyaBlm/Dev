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
        $this->islogged();
        $this->admin();
        $users = $this->model->readAll();
        require 'Admin/Views/Users/listUsers.php';
    }

    public function create()
    {
        $this->islogged();
        $this->admin();
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
        $this->islogged();
        $this->admin();
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
        $this->islogged();
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
        $pageTitle = "S'inscrire";
        $buttonValue = "S'inscrire";
        require './Views/inscription.php';
    }

    public function editUser($id)
    {
        $this->islogged();
        $firstname = $this->VerifBack->verifUserName();
        $lastname = $this->VerifBack->verifUserLastname();
        $email = $this->VerifBack->verifUserMailUpdate();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $infos = [
                'user_nom' => $lastname,
                'user_prenom' => $firstname,
                'user_email' => $email,
                'id_role' => '1',
            ];

            $this->model->update($id, $infos);

            header('Location: /home');
        }
        $user = $this->model->readOnly($id);
        $pageTitle = "Mes informations";
        $buttonValue = "Modifier";
        require './Views/inscription.php';
    }

    public function userPassword($id)
    {
        $user = $this->model->readOnly($id);
        $password = $this->VerifBack->verifPassword();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $infos = [
                'user_password' => $hashedPassword
            ];

            $this->model->update($id, $infos);

            header('Location: /user/editUser/' . $user->id);
        }
        require './Views/editPass.php';
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

    public function logout()
    {
        unset($_SESSION['auth']);
        header('Location: /home');
    }
}
