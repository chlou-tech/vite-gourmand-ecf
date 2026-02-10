<?php

class User
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function findByEmail($email)
    {
        $stmt = $this->pdo->prepare(
            "SELECT * FROM utilisateur WHERE email = :email AND actif = 1"
        );
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    public function emailExists($email)
    {
        $stmt = $this->pdo->prepare(
            "SELECT COUNT(*) FROM utilisateur WHERE email = :email"
        );
        $stmt->execute(['email' => $email]);
        return $stmt->fetchColumn() > 0;
    }

    public function create($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, actif, id_role)
            VALUES (:nom, :prenom, :email, :mot_de_passe, 1, 1)
        ");

        return $stmt->execute([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'mot_de_passe' => $data['mot_de_passe']
        ]);
    }
}
