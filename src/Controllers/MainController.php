<?php

namespace App\Controllers;

use App\Db\Db;

class MainController extends Db
{
    protected Db $pdo;
    protected string $table;

    public function __construct()
    {
        $this->pdo = Db::getInstance();
    }

    public function index() {
        // echo 'coucou';
    }

    //methode uplodfichier
    public function uploadImage($id, $nameDir, $column)
    {
        $errors = [];

        if (isset($_FILES['cover']) && is_uploaded_file($_FILES['cover']['tmp_name'])) {
            $extensions = ['.jpg', '.png', '.jpeg', '.ico', '.JPG', '.PNG', '.JPEG', '.ICO'];
            $ext = strrchr($_FILES['cover']['name'], '.');
            // Si l'extension est autorisée
            if (in_array($ext, $extensions)) {
                $SizeMax = 5 * 1000 * 1000;

                // Si la taille est respectée
                if ($_FILES['cover']['size'] < $SizeMax) {

                    $baseDir = $_SERVER['DOCUMENT_ROOT'] . '/Admin/public/assets/Images';
                    $destinationDir = $baseDir . '/' . $nameDir;

                    // Générer un nom de fichier unique
                    $uniqName = uniqid('img_', true) . $ext;
                    $destinationFile = $destinationDir . '/' . $uniqName;

                    // Crée le dossier s'il n'existe pas
                    if (!file_exists($destinationDir)) {
                        mkdir($destinationDir, 0777, true);
                    }

                    // Déplace le fichier uploadé vers le répertoire de destination
                    if (move_uploaded_file($_FILES['cover']['tmp_name'], $destinationFile)) {
                        // Met à jour le chemin de l'image dans la base de données
                        $updateImg = $this->pdo->prepare("UPDATE $this->table SET $column = :cover WHERE id = :id");
                        $updateImg->execute(['cover' => $uniqName, 'id' => $id]);
                    } else {
                        $errors['cover'] = "Erreur lors du déplacement du fichier.";
                    }
                } else {
                    $errors['cover'] = "Le fichier est trop volumineux. Taille maximale autorisée : 10 Mo.";
                }
            } else {
                $errors['cover'] = "Format d'image non autorisé.";
            }
        } else {
            $errors['cover'] = "Aucun fichier téléchargé.";
        }

        return $errors;
    }
}
