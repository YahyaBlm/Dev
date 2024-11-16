<?php

namespace App\Models;

class Images extends Model {


    public function __construct()
    {
        parent::__construct();
        $this->table = 'images';
    }

    public function findByBook($id)
    {
        $req = "SELECT * from $this->table WHERE id_livre=:id";
        $result = $this->pdo->prepare($req);
        $result->bindValue(":id", $id);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_ASSOC);
    }

}


