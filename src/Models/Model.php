<?php

namespace App\Models;
use App\Db\Db;

class Model extends Db
{

    protected Db $pdo;
    protected string $table;

    public function __construct()
    {
        $this->pdo = Db::getInstance();
    }

    public function readAll()
    {
        $req = "SELECT * from $this->table";
        $result = $this->pdo->prepare($req);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_OBJ);
    }

    public function readOnly($id)
    {
        $req = "SELECT * from $this->table WHERE id=:id";
        $result = $this->pdo->prepare($req);
        $result->bindValue(":id", $id);
        $result->execute();
        return $result->fetch(\PDO::FETCH_OBJ);
    }

    public function create(array $infos)
    {
        // je recupere les données des colonnes dans des tableau keys et placeholders
        $keys = implode(", ", array_keys($infos));
        $placeholders = ":" . implode(", :", array_keys($infos));

        //!Je prepare ma requette en premier
        $req = $this->pdo->prepare("INSERT INTO $this->table ($keys) VALUES ($placeholders)");

        //je cree une boucle foreach pour bind chaque :key a sa value
        foreach ($infos as $key => $value) {
            $req->bindValue(":$key", $value);
        }
        //Jexecute ma requette
        $req->execute();
        return $this->pdo->lastInsertId();
    }

    public function update($id, array $infos)
    {
        // je recupere les données des colonnes dans un tableau queryData
        $queryData = [];
        foreach ($infos as $key => $value) {
            $queryData[] = "$key = :$key"; // nom = :nom, prenom = :prenom
        }
        $queryDataStr = implode(", ", $queryData);

        //!Je prepare ma requette en premier
        $req = $this->pdo->prepare("UPDATE $this->table SET $queryDataStr WHERE id = :id");

        //je cree une boucle foreach pour bind chaque :key a sa value
        foreach ($infos as $key => $value) {
            $req->bindValue(":$key", $value);
        }
        $req->bindValue(":id", $id);

        //Jexecute ma requette
        $req->execute();
    }

    public function delete($id)
    {
        $req = "DELETE FROM $this->table WHERE id= :id";
        $result = $this->pdo->prepare($req);
        $result->bindValue(":id", $id);
        $result->execute();
    }
}
