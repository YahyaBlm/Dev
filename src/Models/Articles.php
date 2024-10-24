<?php

// $infos = [
//     ':id' => $id,
//     ':livre_titre' => $title,
//     ':livre_couverture' => $couverture,
//     ':livre_resume' => $resume,
//     ':livre_linkSale' => $linkSale
// ];
namespace App\Models;

class Articles extends Model {


    public function __construct()
    {
        parent::__construct();
        $this->table = "articles";
    }
}