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
}
