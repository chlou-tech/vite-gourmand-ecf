<?php

require_once __DIR__ . '/../models/Commande.php';
require_once __DIR__ . '/../models/User.php';

class AdminController
{
    private $commandeModel;
    private $userModel;

    public function __construct($pdo)
    {
        $this->commandeModel = new Commande($pdo);
        $this->userModel = new User($pdo);
    }

    public function stats()
    {
        requireMinRole(3); // admin uniquement

        $totalUsers = count($this->userModel->getAll());
        $totalRevenue = $this->commandeModel->getTotalRevenue();
        $commandesByStatut = $this->commandeModel->countByStatut();

        require __DIR__ . '/../views/admin/stats.php';
    }
}
