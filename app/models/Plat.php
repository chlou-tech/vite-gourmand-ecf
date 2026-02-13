<?php

class Plat
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Tous les plats actifs
    public function getAll()
    {
        $stmt = $this->pdo->query(
            "SELECT * FROM plat"
        );
        return $stmt->fetchAll();
    }

    // Détail d’un plat
    public function getById($id)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM plat WHERE id_plat = :id"
        );
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // Création d’un plat
    public function create($data)
{
    $stmt = $this->pdo->prepare("
        INSERT INTO plat (nom, type_plat, description)
        VALUES (:nom, :type_plat, :description)
    ");

    $stmt->execute([
        'nom' => $data['nom'],
        'type_plat' => $data['type_plat'],
        'description' => $data['description']
    ]);

    return $this->pdo->lastInsertId();
}

    // Lier un plat à un menu
    public function attachToMenu($idPlat, $idMenu)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO menu_plat (id_menu, id_plat)
            VALUES (:id_menu, :id_plat)
        ");

        return $stmt->execute([
            'id_menu' => $idMenu,
            'id_plat' => $idPlat
        ]);
    }
}
