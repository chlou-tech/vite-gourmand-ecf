<?php
session_start();

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/helpers/auth.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';
require_once __DIR__ . '/../app/controllers/MenuController.php';
require_once __DIR__ . '/../app/controllers/PlatController.php';
require_once __DIR__ . '/../app/controllers/CommandeController.php';
require_once __DIR__ . '/../app/controllers/AvisController.php';
require_once __DIR__ . '/../app/controllers/ContactController.php';
require_once __DIR__ . '/../app/controllers/UserController.php';
require_once __DIR__ . '/../app/controllers/AdminController.php';
require_once __DIR__ . '/../app/models/Avis.php';



$authController = new AuthController($pdo);
$menuController = new MenuController($pdo);
$platController = new PlatController($pdo);
$commandeController = new CommandeController($pdo);
$avisController = new AvisController($pdo);
$contactController = new ContactController();
$userController = new UserController($pdo);
$adminController = new AdminController($pdo);



$page = $_GET['page'] ?? 'home';

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
    require_once __DIR__ . '/../app/controllers/AvisController.php';
    $avisController = new AvisController($pdo);

    $avisValides = $avisController->getValidated();

    require __DIR__ . '/../app/views/home.php';
    exit;
}

// 🧑‍💼 Page employé 
if ($page === 'employe') {
    requireMinRole(2);

    require __DIR__ . '/../app/views/employe/dashboard.php';
    exit;
}


// 👑 Page administrateur
if ($page === 'admin') {
    requireMinRole(3);
    require __DIR__ . '/../app/views/admin/index.php';
    exit;
}


// UTILISATEURS (admin uniquement)
if ($page === 'users') {
    requireMinRole(3);
    $userController->index();
    exit;
}
if ($page === 'user-update-role') {
    $userController->updateRole();
    exit;
}

// USERS
if ($page === 'users') {
    $userController->index();
    exit;
}

if ($page === 'user-create') {
    $userController->create();
    exit;
}

if ($page === 'user-delete') {
    $userController->delete();
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

// AVIS
if ($page === 'avis-create') {
    $avisController->create();
    exit;
}

if ($page === 'all-avis') {
    $avisController->all();
    exit;
}

if ($page === 'avis-validate') {
    $avisController->validate();
    exit;
}

// Mentions légales et CGV
if ($page === 'mentions-legales') {
    require __DIR__ . '/../app/views/mentions-legales.php';
    exit;
}

if ($page === 'cgv') {
    require __DIR__ . '/../app/views/cgv.php';
    exit;
}

// Contact
if ($page === 'contact') {
    $contactController->index();
    exit;
}

// Statistiques
if ($page === 'stats') {
    $adminController->stats();
    exit;
}

// 🧭 Par défaut
header('Location: index.php?page=login');
exit;
