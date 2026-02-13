<?php

class Avis
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO avis (note, commentaire, valide, date_avis, id_commande)
            VALUES (:note, :commentaire, 0, NOW(), :id_commande)
        ");

        return $stmt->execute([
            'note' => $data['note'],
            'commentaire' => $data['commentaire'],
            'id_commande' => $data['id_commande']
        ]);
    }

    public function getAll()
    {
        return $this->pdo->query("SELECT * FROM avis")->fetchAll();
    }

    public function getValidated()
    {
        return $this->pdo->query("SELECT * FROM avis WHERE valide = 1")->fetchAll();
    }

    public function validate($id, $status)
    {
        $stmt = $this->pdo->prepare("
            UPDATE avis SET valide = :valide WHERE id_avis = :id
        ");

        return $stmt->execute([
            'valide' => $status,
            'id' => $id
        ]);
    }
}