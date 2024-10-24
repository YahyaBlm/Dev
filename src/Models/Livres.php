<?php

namespace App\Models;

class Livres extends Model {


    public function __construct()
    {
        parent::__construct();
        $this->table = 'livres';

    }

}


