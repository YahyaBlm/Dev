<?php

namespace App\Models;

use App\Db\Db;
use App\Models\Users;

class Verifications extends Db
{

    protected $pdo;
    protected $errors = [];
    protected $userModel;

    public function __construct()
    {
        $this->pdo = Db::getInstance();
        $this->userModel = new Users;
    }

    public function verifUserName()
    {
        if (empty($_POST['user_firstname']) || !preg_match('/^[a-zA-Z ]+$/', $_POST['user_firstname'])) { 
            $this->errors['user_firstname'] = "Le champ 'Prénom' n'est pas valide.";
        } else {
            return htmlspecialchars($_POST['user_firstname'], ENT_QUOTES, 'UTF-8');
        }
    }

    public function verifUserLastname()
    {
        if (empty($_POST['user_lastname']) || !preg_match('/^[a-zA-Z ]+$/', $_POST['user_lastname'])) {
            $this->errors['user_lastname'] = "Le champ 'Nom' n'est pas valide.";
        } else {
            return htmlspecialchars($_POST['user_lastname'], ENT_QUOTES, 'UTF-8');
        }
    }

    public function verifUserMailInsert()
    {
        if (empty($_POST['user_email']) || !filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['user_email'] = "Le champ 'E-mail' n'est pas valide.";
        } else {
            $req = $this->pdo->prepare('SELECT id FROM users WHERE user_email = :user_email');
            $req->execute([':user_email' => $_POST['user_email']]);
            $result = $req->fetch();

            if ($result) {
                $this->errors['user_email'] = "Un compte existe déjà pour cet email.";
            } else {
                return htmlspecialchars($_POST['user_email'], ENT_QUOTES, 'UTF-8');
            }
        }
    }

    public function verifUserMailUpdate()
    {
        if (empty($_POST['user_email']) || !filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['user_email'] = "Le champ 'E-mail' n'est pas valide.";
        } else {
            return $_POST['user_email'];
        }
    }

    public function login()
    {
        if (empty($_POST['user_email']) || !filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['user_email'] = "Le champ 'E-mail' n'est pas valide.";
        } else {
            $user = $this->userModel->readByMail($_POST['user_email']);
            if ($user) {
                if (empty($_POST['user_password']) || !password_verify($_POST['user_password'], $user->user_password)) {
                    $this->errors['user_password'] = "Le champ 'Mot de passe' n'est pas valide.";
                } else {
                    return $user;
                }
            }
        }
    }

    public function verifPassword()
    {
        if (empty($_POST['user_password']) || empty($_POST['confMdp']) || $_POST['user_password'] != $_POST['confMdp']) {
            $this->errors['user_password'] = 'Vos mots de passes sont vides ou pas identiques';
        } else {
            return $_POST['user_password'];
        }
    }

    public function displayErrors()
    {
        return $this->errors;
    }
}
