<?php

$host = 'db';
$dbname = 'vite_gourmand';
$username = 'root';
$password = 'root';

$maxAttempts = 5;
$attempt = 0;

while ($attempt < $maxAttempts) {
    try {
        $pdo = new PDO(
            "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
            $username,
            $password
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        break; // connexion OK
    } catch (PDOException $e) {
        $attempt++;
        sleep(2); // attend 2 secondes avant retry
    }
}

if (!isset($pdo)) {
    die('Erreur connexion BDD : impossible de se connecter après plusieurs tentatives.');
}
