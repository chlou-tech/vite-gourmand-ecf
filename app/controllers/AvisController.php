<?php

require_once __DIR__ . '/../models/Avis.php';
require_once __DIR__ . '/../models/Commande.php';

class AvisController
{
    private $avisModel;
    private $commandeModel;

    public function __construct($pdo)
    {
        $this->avisModel = new Avis($pdo);
        $this->commandeModel = new Commande($pdo);
    }

    public function create()
    {
        requireLogin();

        $idCommande = $_GET['id'] ?? null;

        if (!$idCommande) {
            echo "Commande introuvable";
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->avisModel->create([
                'note' => $_POST['note'],
                'commentaire' => $_POST['commentaire'],
                'id_commande' => $idCommande
            ]);

            header('Location: index.php?page=mes-commandes');
            exit;
        }

        require __DIR__ . '/../views/avis/create.php';
    }

    public function all()
    {
        requireMinRole(2);

        $avis = $this->avisModel->getAll();
        require __DIR__ . '/../views/avis/index.php';
    }

    public function validate()
    {
        requireMinRole(2);

        $id = $_GET['id'] ?? null;
        $status = $_GET['status'] ?? null;

        if ($id && in_array($status, ['0', '1'])) {
            $this->avisModel->validate($id, $status);
        }

        header('Location: index.php?page=all-avis');
        exit;
    }
}