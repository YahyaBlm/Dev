<?php

namespace App\Controllers;

use App\Models\Partner;

class PartenairesController 
{
    private $model;
    protected string $table;

    public function __construct()
    {
        $this->model = new Partner();
        $this->table = 'partner';
    }

    public function index()
    {
        $partners = $this->model->readAll();
        require './Views/partenaires.php';
    }
}
