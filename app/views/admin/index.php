<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="main-container">
    <h1 class="page-title">Espace Administrateur</h1>

    <div class="card-grid">

        <div class="dashboard-card">
            <h2>📦 Commandes</h2>
            <p>Consulter et gérer toutes les commandes.</p>
            <a href="index.php?page=all-commandes" class="btn-primary">Voir les commandes</a>
        </div>

        <div class="dashboard-card">
            <h2>🧾 Avis clients</h2>
            <p>Valider ou refuser les avis laissés par les clients.</p>
            <a href="index.php?page=all-avis" class="btn-primary">Gérer les avis</a>
        </div>

        <div class="dashboard-card">
            <h2>🍽️ Menus</h2>
            <p>Créer et modifier les menus proposés.</p>
            <a href="index.php?page=menu-create" class="btn-primary">Créer un menu</a>
        </div>

        <div class="dashboard-card">
            <h2>🥗 Plats</h2>
            <p>Ajouter ou modifier les plats disponibles.</p>
            <a href="index.php?page=plat-create" class="btn-primary">Créer un plat</a>
        </div>

        <div class="dashboard-card">
            <h2>👥 Utilisateurs</h2>
            <p>Gérer les comptes utilisateurs.</p>
            <a href="index.php?page=users" class="btn-primary">Gérer les utilisateurs</a>
        </div>

        <div class="dashboard-card">
            <h3>📊 Statistiques</h3>
            <p>Voir les indicateurs clés de performance.</p>

            <a href="index.php?page=stats" class="btn-primary">
                Voir les statistiques
            </a>
        </div>

    </div>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
