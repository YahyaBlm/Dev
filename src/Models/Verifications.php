<?php

namespace App\Models;

use App\Db\Db;

class Verifications extends Db
{

    protected $pdo;
    protected $errors = [];

    public function __construct()
    {
        $this->pdo = Db::getInstance();
    }


    public function verifUserName()
    {
        if (empty($_POST['user_firstname']) || !preg_match('/^[a-zA-Z ]+$/', $_POST['user_firstname'])) {
            $this->errors['user_firstname'] = "Le champ 'Prénom' n'est pas valide.";
        } else {
            return $_POST['user_firstname'];
        }
    }

    public function verifUserLastname()
    {
        if (empty($_POST['user_lastname']) || !preg_match('/^[a-zA-Z ]+$/', $_POST['user_lastname'])) {
            $this->errors['user_lastname'] = "Le champ 'Nom' n'est pas valide.";
        } else {
            return $_POST['user_lastname'];
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
                return $_POST['user_email'];
            }
        } 
    }

    public function verifUserMailUpdate ()
    {
        if (empty($_POST['user_email']) || !filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['user_email'] = "Le champ 'E-mail' n'est pas valide.";
        } else {
            return $_POST['user_email'];
        }
    }

    public function verifPassword()
    {
        if (empty($_POST['user_password']) || empty($_POST['confMdp']) || $_POST['user_password'] != $_POST['confMdp']) {
            $this->errors['user_password'] = 'Vos mots de passes sont vides ou non identiques';
        } else {
            return $_POST['user_password'];
        }
    }

    public function verifLogin(array $infos)
    {
        // $this->pdo->verifUserMail;
        // $this->pdo->verifPassword;

        if (!empty($_POST['user_email']) && !empty($_POST['user_password'])) {
            $req = $this->pdo->prepare('SELECT * FROM users
                NATURAL JOIN roles
                WHERE user_email = :user_email
                ');
            $req->bindValue(':user_email', $infos['user_email']);
            $req->execute();
            $user = $req->fetch();

            if ($user) {
                if (password_verify($_POST['user_password'], $user['user_password'])) {
                    $_SESSION['auth'] = $user;

                    header('Location: ' . $_SERVER['HTTP_REFERER'] . "?id=" . $_SESSION['auth']['id_user']);
                } else {
                    $this->errors['user'] = "Votre email ou mot de passe est incorrect.";
                }
            } else {
                $this->errors['user'] = "Votre email ou mot de passe est incorrect.";
            }
        } else {
            $this->errors['fields'] = "Les champs email et mot de passe doivent être remplis.";
        }
    }

    public function displayErrors()
    {
        return $this->errors;
    }
}
