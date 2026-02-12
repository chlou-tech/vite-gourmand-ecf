<?php
session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/helpers/auth.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/MenuController.php';
require_once __DIR__ . '/../app/controllers/PlatController.php';
require_once __DIR__ . '/../app/controllers/CommandeController.php';

$authController = new AuthController($pdo);
$menuController = new MenuController($pdo);
$platController = new PlatController($pdo);
$commandeController = new CommandeController($pdo);

$page = $_GET['page'] ?? 'login';

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
    requireLogin();

    echo "<h1>Bienvenue</h1>";
    echo "<p>Email : " . htmlspecialchars($_SESSION['user']['email']) . "</p>";

    if ($_SESSION['user']['role'] == 1) {
        echo "<p>Profil : Utilisateur</p>";
    }

    if ($_SESSION['user']['role'] == 2) {
        echo "<p>Profil : Employé</p>";
        echo "<a href='index.php?page=employe'>Espace employé</a><br>";
    }

    if ($_SESSION['user']['role'] == 3) {
        echo "<p>Profil : Administrateur</p>";
        echo "<a href='index.php?page=employe'>Espace employé</a><br>";
        echo "<a href='index.php?page=admin'>Espace administrateur</a><br>";
    }

    echo "<br><a href='logout.php'>Se déconnecter</a>";
    exit;
}

// 🧑‍💼 Page employé 
if ($page === 'employe') {
    requireRole(2);

    echo "<h1>Espace Employé</h1>";
    echo "<p>Gestion des commandes</p>";
    echo "<a href='index.php?page=home'>Accueil</a>";
    exit;
}

// 👑 Page administrateur
if ($page === 'admin') {
    requireRole(3);

    echo "<h1>Espace Administrateur</h1>";
    echo "<p>Gestion des utilisateurs et statistiques</p>";
    echo "<a href='index.php?page=home'>Accueil</a>";
    exit;
}

// 🍽️ MENUS 
if ($page === 'menus') {
    $menuController->index();
    exit;
}

if ($page === 'menu') {
    $menuController->show();
    exit;
}

if ($page === 'menu-create') {
    $menuController->create();
    exit;
}

// PLATS 
if ($page === 'plats') {
    $platController->index();
    exit;
}

if ($page === 'plat-create') {
    $platController->create();
    exit;
}

// COMMANDES
if ($page === 'commande-create') {
    $commandeController->create();
    exit;
}

if ($page === 'mes-commandes') {
    $commandeController->mesCommandes();
    exit;
}

if ($page === 'all-commandes') {
    $commandeController->all();
    exit;
}

// Statut de commande
if ($page === 'commande-update-statut') {
    $commandeController->updateStatut();
    exit;
}
if ($page === 'commande-annuler') {
    $commandeController->annuler();
    exit;
}


// 🧭 Par défaut
header('Location: index.php?page=login');
exit;
