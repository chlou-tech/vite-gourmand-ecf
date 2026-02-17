<?php require __DIR__ . '/../layout/header.php'; ?>

<h1 class="page-title">Espace Employé</h1>

<div class="cards-container">

    <div class="card">
        <h3>📦 Gestion des commandes</h3>
        <p>Consulter et modifier le statut des commandes clients.</p>
        <a class="btn-primary" href="index.php?page=all-commandes">
            Voir les commandes
        </a>
    </div>

    <div class="card">
        <h3>🍽️ Gestion des menus</h3>
        <p>Créer et modifier les menus proposés par l’entreprise.</p>
        <a class="btn-primary" href="index.php?page=menu-create">
            Créer un menu
        </a>
    </div>

    <div class="card">
        <h3>🥗 Gestion des plats</h3>
        <p>Ajouter ou modifier les plats disponibles.</p>
        <a class="btn-primary" href="index.php?page=plat-create">
            Créer un plat
        </a>
    </div>

    <div class="card">
        <h3>⭐ Gestion des avis</h3>
        <p>Valider ou refuser les avis clients.</p>
        <a class="btn-primary" href="index.php?page=all-avis">
            Voir les avis
        </a>
    </div>


</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
