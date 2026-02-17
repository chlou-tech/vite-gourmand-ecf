<!DOCTYPE html>
<html>
<head>
    <title>Vite & Gourmand</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<header>
    <h1>Vite & Gourmand</h1>

    <nav>

        <a href="index.php?page=home">Accueil</a>
        <a href="index.php?page=menus">Menus</a>
        <a href="index.php?page=plats">Plats</a>
        <a href="index.php?page=contact">Contact</a>

        <?php if (isset($_SESSION['user'])): ?>

            <?php if ($_SESSION['user']['role'] == 1): ?>
                <a href="index.php?page=mes-commandes">Mes commandes</a>
            <?php endif; ?>

            <?php if ($_SESSION['user']['role'] >= 2): ?>
                <a href="index.php?page=employe">Espace employé</a>
            <?php endif; ?>

            <?php if ($_SESSION['user']['role'] == 3): ?>
                <a href="index.php?page=admin">Espace admin</a>
            <?php endif; ?>

            <a href="logout.php">Déconnexion</a>

        <?php else: ?>

            <a href="index.php?page=login">Connexion</a>
            <a href="index.php?page=register">Inscription</a>

        <?php endif; ?>

    </nav>
</header>