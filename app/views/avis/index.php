<?php require __DIR__ . '/../layout/header.php'; ?>

<h1 class="page-title">Gestion des avis</h1>

<div class="cards-container">

<?php if (!empty($avis)): ?>

    <?php foreach ($avis as $unAvis): ?>

        <div class="card">

            <p>
                <?php for ($i = 1; $i <= 5; $i++): ?>
                    <?= $i <= $unAvis['note'] ? "⭐" : "☆" ?>
                <?php endfor; ?>
            </p>

            <p>
                <?= htmlspecialchars($unAvis['commentaire']) ?>
            </p>

            <p>
                <strong>Statut :</strong>
                <span class="badge <?= $unAvis['valide'] ? 'validee' : 'en_attente' ?>">
                    <?= $unAvis['valide'] ? 'Validé' : 'En attente' ?>
                </span>
            </p>

            <?php if (!$unAvis['valide']): ?>
                <div class="dashboard-actions">
                    <a class="btn-primary"
                       href="index.php?page=avis-validate&id=<?= $unAvis['id_avis'] ?>&status=1">
                        Valider
                    </a>

                    <a class="btn-danger"
                       href="index.php?page=avis-validate&id=<?= $unAvis['id_avis'] ?>&status=0">
                        Refuser
                    </a>
                </div>
            <?php endif; ?>

        </div>

    <?php endforeach; ?>

<?php else: ?>

    <p style="text-align:center;">Aucun avis disponible.</p>

<?php endif; ?>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
