<?php

namespace App\Controllers;

use App\Models\Users;
use App\Models\Verifications;

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
