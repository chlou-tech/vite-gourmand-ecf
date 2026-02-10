<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

$authController = new AuthController($pdo);

$page = $_GET['page'] ?? 'login';

if (isset($_SESSION['user'])) {
    echo "<h1>Bienvenue, vous êtes connecté !</h1>";
    echo "<p>Email : " . $_SESSION['user']['email'] . "</p>";
    exit;
}
