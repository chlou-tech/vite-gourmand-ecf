<?php require __DIR__ . '/../layout/header.php'; ?>

<h1 class="page-title">📊 Statistiques</h1>

<div class="dashboard-grid">

    <div class="dashboard-card">
        <h3>👥 Utilisateurs</h3>
        <p><?= $totalUsers ?></p>
    </div>

    <div class="dashboard-card">
        <h3>💰 Chiffre d'affaires</h3>
        <p><?= number_format($totalRevenue, 2) ?> €</p>
    </div>

</div>

<h2 class="page-title">📦 Commandes par statut</h2>

<div class="dashboard-grid">
<?php foreach ($commandesByStatut as $stat): ?>
    <div class="dashboard-card">
        <h3><?= ucfirst(str_replace('_', ' ', $stat['statut'])) ?></h3>
        <p><?= $stat['total'] ?> commandes</p>
    </div>
<?php endforeach; ?>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
