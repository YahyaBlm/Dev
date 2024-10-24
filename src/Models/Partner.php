<?php

namespace App\Models;

class Partner extends Model {


    public function __construct()
    {
        parent::__construct();
        $this->table = 'partner';

    }
}
