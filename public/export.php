<?php

require __DIR__ . '/../config/database.php';

$tables = [];
$result = $pdo->query("SHOW TABLES");

while ($row = $result->fetch(PDO::FETCH_NUM)) {
    $tables[] = $row[0];
}

$sql = "";

foreach ($tables as $table) {
    
    // Structure
    $create = $pdo->query("SHOW CREATE TABLE $table")->fetch(PDO::FETCH_ASSOC);
    $sql .= $create['Create Table'] . ";\n\n";

    // Données
    $rows = $pdo->query("SELECT * FROM $table");
    
    foreach ($rows as $row) {
        $values = array_map(function ($value) use ($pdo) {
            return $value === null ? "NULL" : $pdo->quote($value);
        }, array_values($row));

        $sql .= "INSERT INTO $table VALUES (" . implode(",", $values) . ");\n";
    }

    $sql .= "\n\n";
}

file_put_contents("export.sql", $sql);

echo "Export terminé ✅";