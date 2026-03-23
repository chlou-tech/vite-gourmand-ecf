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

        return $stmt->execute([
            'titre' => $data['titre'],
            'description' => $data['description'] ?? null,
            'theme' => $data['theme'] ?? null,
            'regime' => $data['regime'] ?? null,
            'nb_personnes_min' => $data['nb_personnes_min'],
            'prix_base' => $data['prix_base'],
            'conditions' => $data['conditions'] ?? null,
            'stock' => isset($data['stock']) && $data['stock'] !== '' 
                ? (int)$data['stock'] 
                : 0
        ]);

    }


    // Filtrer les menus
    public function getFiltered($filters)
    {
        $sql = "SELECT * FROM menu WHERE actif = 1";
        $params = [];

        if (!empty($filters['prixMax'])) {
            $sql .= " AND prix_base <= :prixMax";
            $params['prixMax'] = $filters['prixMax'];
        }

        if (!empty($filters['theme'])) {
            $sql .= " AND theme LIKE :theme";
            $params['theme'] = '%' . $filters['theme'] . '%';
        }

        if (!empty($filters['regime'])) {
            $sql .= " AND regime LIKE :regime";
            $params['regime'] = '%' . $filters['regime'] . '%';
        }

        if (!empty($filters['nbPersonnes'])) {
            $sql .= " AND nb_personnes_min <= :nbPersonnes";
            $params['nbPersonnes'] = $filters['nbPersonnes'];
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll();
    }
}
