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
        $filters = [
            'prixMax' => $_GET['prixMax'] ?? null,
            'theme' => $_GET['theme'] ?? null,
            'regime' => $_GET['regime'] ?? null,
            'nbPersonnes' => $_GET['nbPersonnes'] ?? null
        ];

        $menus = $this->menuModel->getFiltered($filters);

        // 🔥 AJOUT ICI
        if (isset($_GET['ajax'])) {
            require __DIR__ . '/../views/menus/_list.php';
            exit;
        }

        // affichage normal
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
        requireMinRole(2); // admin + employé

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->menuModel->create($_POST);
            header('Location: /?page=menus');
            exit;
        }

        require __DIR__ . '/../views/menus/create.php';
    }

}
