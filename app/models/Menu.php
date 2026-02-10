<?php

class Menu
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Menus visibles (actifs)
    public function getAll()
    {
        $stmt = $this->pdo->query(
            "SELECT * FROM menu WHERE actif = 1"
        );
        return $stmt->fetchAll();
    }

    // Détail d’un menu
    public function getById($id)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM menu WHERE id_menu = :id AND actif = 1"
        );
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Création d’un menu
    public function create($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO menu 
            (titre, description, theme, regime, nb_personnes_min, prix_base, conditions, stock, actif)
            VALUES 
            (:titre, :description, :theme, :regime, :nb_personnes_min, :prix_base, :conditions, :stock, 1)
        ");

        return $stmt->execute($data);
    }
}
