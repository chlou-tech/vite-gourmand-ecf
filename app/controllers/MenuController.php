<?php

require_once __DIR__ . '/../models/Menu.php';

class MenuController
{
    private $menuModel;

    public function __construct($pdo)
    {
        $this->menuModel = new Menu($pdo);
    }

    // Liste des menus
    public function index()
    {
        $menus = $this->menuModel->getAll();
        require __DIR__ . '/../views/menus/index.php';
    }

    // Détail d’un menu
    public function show()
    {
        $id = $_GET['id'] ?? null;

        if (!$id) {
            echo "Menu introuvable";
            return;
        }

        $menu = $this->menuModel->getById($id);
        require __DIR__ . '/../views/menus/show.php';
    }

    // Création (admin)
    public function create()
    {
        requireRole(3); // admin uniquement

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->menuModel->create($_POST);
            header('Location: index.php?page=menus');
            exit;
        }

        require __DIR__ . '/../views/menus/create.php';
    }
}
