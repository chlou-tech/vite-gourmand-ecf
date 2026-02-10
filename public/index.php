<?php
session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';

$authController = new AuthController($pdo);

$page = $_GET['page'] ?? 'login';

// 🔐 Pages privées
$protectedPages = ['home'];

// 🔒 Si page protégée et pas connecté → login
if (in_array($page, $protectedPages) && !isset($_SESSION['user'])) {
    header('Location: index.php?page=login');
    exit;
}

// 🔁 Si déjà connecté et essaie d’aller sur login/register → home
if (isset($_SESSION['user']) && in_array($page, ['login', 'register'])) {
    header('Location: index.php?page=home');
    exit;
}

// 🚪 Routes publiques
if ($page === 'login') {
    $authController->login();
    exit;
}

if ($page === 'register') {
    $authController->register();
    exit;
}

// 🏠 Accueil connecté
if ($page === 'home') {
    echo "<h1>Bienvenue, vous êtes connecté !</h1>";
    echo "<p>Email : " . htmlspecialchars($_SESSION['user']['email']) . "</p>";
    echo "<a href='logout.php'>Se déconnecter</a>";
    exit;
}

// 🧭 Par défaut
header('Location: index.php?page=login');
exit;
