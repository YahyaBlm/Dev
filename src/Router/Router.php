<?php

namespace App\Router;

use App\Controllers\HomeController;

class Router
{
    public function start()
    {
        //retirer le dernier '/' de l'URL
        $uri = $_SERVER['REQUEST_URI'];
        //on verifie que uri nest pas vide et se termine par un /
        if (!empty($uri) && $uri != '/' && $uri[-1] === "/") {
            //si oui j'enelve le /
            $uri = substr($uri, 0, -1);

            //code de redirection permanante
            http_response_code(301);

            //rediriger
            header('Location: ' . $uri);
        }

        //Gerer les parametres URL. controlleur methode parametre = Partner/update/3
        //separer les parametres
        $params = [''];
        if (isset($_GET['url'])) {
            $params = explode('/', filter_var($_GET['url'],FILTER_SANITIZE_URL)); 
        }

        

        if ($params[0] != '') {
            //on a au moins un parametre
            //recuperer le nom du controller - Maj+namespace+controller

            $controller = "\\App\\Controllers\\" . ucfirst(array_shift($params)) . 'Controller'; //BookController

            //instanciation du controller
            $controller = new $controller;

            //recuperer le 2eme parametres url
            // $action = (isset($params[0])) ? array_shift($params) : 'index';

            if (isset($params[0])) {
                $action = array_shift($params);
            } else {
                $action = 'index';
            }

            if (method_exists($controller, $action)) {
                //si ya encore des parametres 
                // (isset($params[0])) ? $controller->action($params) : $controller->action();
                if (isset($params[0])) {
                    $controller->$action(...$params); // ... spread oparator pour vider le tableau dans les parentheses
                } else {
                    $controller->$action();
                }

            } else {
                http_response_code(404);
                echo 'Page introuvable';
            }
        } else {
            //Sinon on instancie le controller par defaut 
            $controller = new HomeController;
            $controller->index();
        }
    }
}

