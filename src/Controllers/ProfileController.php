<?php

namespace App\Controllers;

use App\Models\Users;

class ProfileController
{
    private $model;
    protected string $table;

    public function __construct()
    {
        $this->model = new Users();
        $this->table = 'users';
    }

    public function index()
    {
        $users = $this->model->readAll();
        require './Views/profile.php';
    }
}
