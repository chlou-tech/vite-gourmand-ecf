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
            INSERT INTO utilisateur 
            (nom, prenom, email, mot_de_passe, id_role, actif)
            VALUES (:nom, :prenom, :email, :mot_de_passe, :id_role, 1)
        ");

        return $stmt->execute([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'mot_de_passe' => $data['mot_de_passe'],
            'id_role' => $data['id_role'] ?? 1 // défaut = utilisateur
        ]);
    }

    public function getAll()
    {
        $stmt = $this->pdo->query("
        SELECT id_user, nom, prenom, email, id_role FROM utilisateur
        WHERE actif = 1
        ");
        return $stmt->fetchAll();
    }

    public function updateRole($id, $role)
    {
        $stmt = $this->pdo->prepare("
            UPDATE utilisateur 
            SET id_role = :role 
            WHERE id_user = :id
            ");

            return $stmt->execute([
            'role' => $role,
            'id' => $id
            ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("
            UPDATE utilisateur
            SET actif = 0
            WHERE id_user = :id
        ");

        return $stmt->execute(['id' => $id]);
    }


}
