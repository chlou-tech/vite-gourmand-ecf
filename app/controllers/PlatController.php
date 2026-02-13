<?php

require_once __DIR__ . '/../models/Plat.php';
require_once __DIR__ . '/../models/Menu.php';
require_once __DIR__ . '/../models/Allergene.php';

class PlatController
{
    private $platModel;
    private $menuModel;
    private $allergeneModel;

    public function __construct($pdo)
    {
        $this->platModel = new Plat($pdo);
        $this->menuModel = new Menu($pdo);
        $this->allergeneModel = new Allergene($pdo);
    }
    
    // Liste des plats
    public function index()
{
    $plats = $this->platModel->getAll();

    foreach ($plats as &$plat) {
        $plat['allergenes'] = $this->allergeneModel->getByPlat($plat['id_plat']);
    }

    require __DIR__ . '/../views/plats/index.php';
}

    // Création d’un plat
    public function create()
    {
        requireMinRole(2); // employé + admin 
        if ($_SESSION['user']['role'] < 2) {
    echo "Accès refusé";
    exit;
}

        $menus = $this->menuModel->getAll();
        $allergenes = $this->allergeneModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idPlat = $this->platModel->create($_POST);

            if (!empty($_POST['menus'])) {
                foreach ($_POST['menus'] as $idMenu) {
                    $this->platModel->attachToMenu($idPlat, $idMenu);
                }
            }
            if (!empty($_POST['allergenes'])) {
                foreach ($_POST['allergenes'] as $idAllergene) {
                    $this->allergeneModel->attachToPlat($idPlat, $idAllergene);
                    }
            }

            header('Location: index.php?page=plats');
            exit;
        }

        require __DIR__ . '/../views/plats/create.php';
    }
}
