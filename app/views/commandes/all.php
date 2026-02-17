<?php require __DIR__ . '/../layout/header.php'; ?>

<h1 class="page-title">Toutes les commandes</h1>

<div class="cards-container">

<?php foreach ($commandes as $commande): ?>

    <div class="card">

        <p><strong>Date :</strong> <?= htmlspecialchars($commande['date_commande']) ?></p>

        <p><strong>Menu :</strong> <?= htmlspecialchars($commande['titre']) ?></p>

        <p><strong>Personnes :</strong> <?= $commande['nb_personnes'] ?></p>

        <p><strong>Prix total :</strong> <?= number_format($commande['prix_total'], 2) ?> €</p>

        <p>
            <strong>Statut :</strong>
            <span class="badge <?= $commande['statut'] ?>">
                <?= ucfirst(str_replace('_', ' ', $commande['statut'])) ?>
            </span>
        </p>

        <div class="status-actions">

        <a class="btn-status btn-validate"
        href="index.php?page=commande-update-statut&id=<?= $commande['id_commande'] ?>&statut=validee">
        Valider
        </a>

        <a class="btn-status btn-prepa"
        href="index.php?page=commande-update-statut&id=<?= $commande['id_commande'] ?>&statut=en_preparation">
        Préparation
        </a>

        <a class="btn-status btn-livree"
        href="index.php?page=commande-update-statut&id=<?= $commande['id_commande'] ?>&statut=livree">
        Livrée
        </a>

        <a class="btn-status btn-annule"
        href="index.php?page=commande-update-statut&id=<?= $commande['id_commande'] ?>&statut=annulee">
        Annuler
        </a>

        </div>


    </div>

<?php endforeach; ?>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
