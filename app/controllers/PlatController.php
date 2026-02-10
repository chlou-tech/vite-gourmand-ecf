<?php

require_once __DIR__ . '/../models/Plat.php';
require_once __DIR__ . '/../models/Menu.php';

class PlatController
{
    private $platModel;
    private $menuModel;

    public function __construct($pdo)
    {
        $this->platModel = new Plat($pdo);
        $this->menuModel = new Menu($pdo);
    }

    // Liste des plats
    public function index()
    {
        $plats = $this->platModel->getAll();
        require __DIR__ . '/../views/plats/index.php';
    }

    // Création d’un plat
    public function create()
    {
        requireLogin(); // employé + admin 
        if ($_SESSION['user']['role'] < 2) {
    echo "Accès refusé";
    exit;
}

        $menus = $this->menuModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idPlat = $this->platModel->create($_POST);

            if (!empty($_POST['menus'])) {
                foreach ($_POST['menus'] as $idMenu) {
                    $this->platModel->attachToMenu($idPlat, $idMenu);
                }
            }

            header('Location: index.php?page=plats');
            exit;
        }

        require __DIR__ . '/../views/plats/create.php';
    }
}
