<?php

require_once '../config/database.php';

try {
    $sql = file_get_contents('../database.sql');
    $pdo->exec($sql);

    echo "✅ Import réussi !";
} catch (PDOException $e) {
    echo "❌ Erreur : " . $e->getMessage();
}

