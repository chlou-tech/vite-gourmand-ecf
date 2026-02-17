<?php

require_once __DIR__ . '/../models/Commande.php';
require_once __DIR__ . '/../models/Menu.php';
require_once __DIR__ . '/../helpers/auth.php';

class CommandeController
{
    private $commandeModel;
    private $menuModel;

    public function __construct($pdo)
    {
        $this->commandeModel = new Commande($pdo);
        $this->menuModel = new Menu($pdo);
    }

    // Création d’une commande (utilisateur connecté)
    public function create()
    {
        requireLogin();
        requireMinRole(1);

        $menus = $this->menuModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $menu = $this->menuModel->getById($_POST['id_menu']);

            $prixTotal = $menu['prix_base'] * $_POST['nb_personnes'];

            $this->commandeModel->create([
                'date_prestation' => $_POST['date_prestation'],
                'heure_livraison' => $_POST['heure_livraison'],
                'adresse_livraison' => $_POST['adresse_livraison'],
                'nb_personnes' => $_POST['nb_personnes'],
                'prix_total' => $prixTotal,
                'prix_livraison' => 10,
                'id_user' => $_SESSION['user']['id'],
                'id_menu' => $_POST['id_menu']
            ]);

            header('Location: index.php?page=mes-commandes');
            exit;
        }

        require __DIR__ . '/../views/commandes/create.php';
    }

    // Commandes de l'utilisateur
    public function mesCommandes()
    {
        requireLogin();

        $commandes = $this->commandeModel->getByUser($_SESSION['user']['id']);
        require __DIR__ . '/../views/commandes/mes_commandes.php';
    }

    // Toutes les commandes (employé + admin)
    public function all()
    {
        requireMinRole(2);

        $commandes = $this->commandeModel->getAll();
        require __DIR__ . '/../views/commandes/all.php';
    }

    // Statut de commande
    public function updateStatut()
{
    requireMinRole(2); // employé + admin

    $id = $_GET['id'] ?? null;
    $statut = $_GET['statut'] ?? null;

    $statutsAutorises = [
        'en_attente',
        'validee',
        'en_preparation',
        'livree',
        'annulee'
    ];

    if (!$id || !in_array($statut, $statutsAutorises)) {
        echo "Statut invalide";
        exit;
    }

    $this->commandeModel->updateStatut($id, $statut);

    header('Location: index.php?page=all-commandes');
    exit;
}

public function annuler()
{
    requireLogin();

    $id = $_GET['id'] ?? null;

    if (!$id) {
        echo "Commande introuvable";
        exit;
    }

    // Vérifie que la commande appartient à l'utilisateur
    $commandes = $this->commandeModel->getByUser($_SESSION['user']['id']);

    foreach ($commandes as $commande) {
        if ($commande['id_commande'] == $id && $commande['statut'] === 'en_attente') {
            $this->commandeModel->updateStatut($id, 'annulee');
            break;
        }
    }

    header('Location: index.php?page=mes-commandes');
    exit;
}

}
