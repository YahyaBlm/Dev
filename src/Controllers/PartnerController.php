<?php

namespace App\Controllers;

use App\Models\Partner;

class PartnerController extends MainController
{
    private $model;

    public function __construct()
    {
        parent::__construct();
        $this->model = new Partner();
        $this->table = "partner";
    }

    public function index()
    {
        $partners = $this->model->readAll();
        require 'Admin/Views/Partner/listPartners.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nameDir = "PartnerImages";
            $infos = [
                'partner_prenom' => $_POST['firstname'],
                'partner_nom' => $_POST['lastname'],
                'partner_description' => $_POST['descript'],
                'partner_link' => $_POST['link'],
                'id_user' => '1'
            ];

            $id = $this->model->create($infos);
            $this->uploadImage($id, $nameDir, 'partner_image');

            header('Location: /Partner');
        } else {
            $pageTitle = "Ajouter un Partenaire";
            $buttonValue = "Ajouter";
            require 'Admin/Views/Partner/insertEditPartner.php';
        }
    }

    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $partnerDescript = $_POST['descript'];
            $nameDir = "PartnerImages";
            $infos = [
                'partner_nom' => $_POST['lastname'],
                'partner_prenom' => $_POST['firstname'],
                'partner_description' => $partnerDescript,
                'partner_link' => $_POST['link']
            ];
            
            $this->model->update($id, $infos);

            if ($_FILES['cover']) {
                $this->uploadImage($id, $nameDir, 'partner_image');
            }

            header('Location: /partner/index');
        }
        $pageTitle = "Vue du Partenaire";
        $partner = $this->model->readOnly($id);
        $partnerDescript = $partner->partner_description;
        $buttonValue = "Modifier";
        require 'Admin/Views/Partner/insertEditPartner.php';
    }

    public function delete($id)
    {
        $partner = $this->model->readOnly($id);
        $delete = "Voulez-vous supprimer le partenaire \"" . $partner->partner_prenom . " " . $partner->partner_nom . "\" ?";

        if (isset($_POST['yes'])) {
            $this->model->delete($id);

            header('Location: /Partner');
            exit();
        } else if (isset($_POST['no'])) {
            header('Location: /Partner');
            exit();
        }
        $root = "/Partner";
        require 'Admin/Views/delete.php';
    }
}
