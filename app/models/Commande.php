<?php

class Commande
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Création d’une commande
    public function create($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO commande 
            (date_commande, date_prestation, heure_livraison, adresse_livraison, 
             nb_personnes, prix_total, prix_livraison, statut, id_user, id_menu)
            VALUES 
            (NOW(), :date_prestation, :heure_livraison, :adresse_livraison,
             :nb_personnes, :prix_total, :prix_livraison, 'en_attente', :id_user, :id_menu)
        ");

        return $stmt->execute($data);
    }

    // Commandes d’un utilisateur
    public function getByUser($idUser)
    {
    $stmt = $this->pdo->prepare("
        SELECT c.*, m.titre
        FROM commande c
        JOIN menu m ON c.id_menu = m.id_menu
        WHERE c.id_user = :id_user
        ORDER BY c.date_commande DESC
    ");

    $stmt->execute(['id_user' => $idUser]);
    return $stmt->fetchAll();
    }

    // Toutes les commandes
    public function getAll()
    {
        $stmt = $this->pdo->query("
        SELECT c.*, m.titre
        FROM commande c
        JOIN menu m ON c.id_menu = m.id_menu
        ORDER BY c.date_commande DESC
        ");
        
        return $stmt->fetchAll();
    }
    public function updateStatut($id, $statut)
    {
        $stmt = $this->pdo->prepare("
        UPDATE commande
        SET statut = :statut
        WHERE id_commande = :id
        ");

        return $stmt->execute([
        'statut' => $statut,
        'id' => $id
        ]);
    }

}
