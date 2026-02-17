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

    // Filtrer les menus
    public function filter($filters)
{
    $sql = "SELECT * FROM menu WHERE 1=1";
    $params = [];

    if (!empty($filters['prix_max'])) {
        $sql .= " AND prix_base <= :prix_max";
        $params['prix_max'] = $filters['prix_max'];
    }

    if (!empty($filters['theme'])) {
        $sql .= " AND theme = :theme";
        $params['theme'] = $filters['theme'];
    }

    if (!empty($filters['regime'])) {
        $sql .= " AND regime = :regime";
        $params['regime'] = $filters['regime'];
    }

    if (!empty($filters['nb_personnes_min'])) {
        $sql .= " AND nb_personnes_min >= :nb";
        $params['nb'] = $filters['nb_personnes_min'];
    }

    $stmt = $this->pdo->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll();
}
}
