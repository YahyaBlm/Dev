<?php

namespace App\Models;

class Comments extends Model
{


    public function __construct()
    {
        parent::__construct();
        $this->table = "commentaires";
    }

    public function readAll()
    {
        $req = "SELECT $this->table.* , livre_titre , user_prenom , user_nom FROM $this->table
        JOIN Livres ON livres.id = id_livre 
        JOIN users ON users.id = id_user";
        $result = $this->pdo->prepare($req);
        $result->execute();
        return $result->fetchAll();
    }

    public function readOnly($id)
    {
        $req = "SELECT $this->table.* , livre_titre , user_prenom , user_nom 
        FROM $this->table
        JOIN Livres ON livres.id = id_livre 
        JOIN users ON users.id = id_user
        WHERE $this->table.id = :id";
        $result = $this->pdo->prepare($req);
        $result->bindValue(":id", $id);
        $result->execute();
        return $result->fetch();
    }

    public function getComments($idBook)
    {
        $req = "SELECT $this->table.*, user_prenom , user_nom FROM $this->table
        JOIN Users ON Users.id = id_user
        WHERE id_livre = :id_livre";
        $result = $this->pdo->prepare($req);
        $result->bindValue(":id_livre" , $idBook);
        $result->execute();
        return $result->fetchAll();
    }
}
