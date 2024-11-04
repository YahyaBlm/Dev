<?php

namespace App\Models;

class Users extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = 'users';
    }

    public function readAll()
    {
        $req = "SELECT $this->table.* , role_name FROM $this->table
        JOIN roles ON roles.id = id_role 
        ORDER BY user_nom ASC" ;
        $result = $this->pdo->prepare($req);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_OBJ);
    }

    public function readOnly($id)
    {
        $req = "SELECT $this->table.* , role_name, role_level FROM $this->table
        JOIN roles ON roles.id = id_role
        WHERE users.id = :id";
        $result = $this->pdo->prepare($req);
        $result->bindValue(":id", $id);
        $result->execute();
        return $result->fetch(\PDO::FETCH_OBJ);
    }

    public function getRolesNames()
    {
        $req = "SELECT * FROM roles";
        $result = $this->pdo->prepare($req);
        $result->execute();
        return $result->fetchAll(\PDO::FETCH_OBJ);
    }

    public function readByMail($email)
    {
        $req = "SELECT * from $this->table WHERE user_email=:user_email";
        $result = $this->pdo->prepare($req);
        $result->bindValue(":user_email", $email);
        $result->execute();
        return $result->fetch(\PDO::FETCH_OBJ);
    }
}
