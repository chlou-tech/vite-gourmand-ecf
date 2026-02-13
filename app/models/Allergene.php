<?php

class Allergene
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAll()
    {
        return $this->pdo->query("SELECT * FROM allergene")->fetchAll();
    }

    public function create($nom)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO allergene (nom) VALUES (:nom)
        ");

        return $stmt->execute(['nom' => $nom]);
    }

    public function attachToPlat($idPlat, $idAllergene)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO plat_allergene (id_plat, id_allergene)
            VALUES (:id_plat, :id_allergene)
        ");

        return $stmt->execute([
            'id_plat' => $idPlat,
            'id_allergene' => $idAllergene
        ]);
    }

    public function getByPlat($idPlat)
    {
        $stmt = $this->pdo->prepare("
            SELECT a.*
            FROM allergene a
            JOIN plat_allergene pa ON a.id_allergene = pa.id_allergene
            WHERE pa.id_plat = :id_plat
        ");

        $stmt->execute(['id_plat' => $idPlat]);
        return $stmt->fetchAll();
    }
}