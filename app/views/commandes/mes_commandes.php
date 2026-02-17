<?php require __DIR__ . '/../layout/header.php'; ?>

<section>
    <h2 class="page-title">Mes commandes</h2>

    <div class="card-container">

        <?php if (!empty($commandes)): ?>

            <?php foreach ($commandes as $commande): ?>

                <div class="card">

                    <p><strong>Date :</strong>
                        <?= htmlspecialchars($commande['date_commande']) ?>
                    </p>

                    <p><strong>Menu :</strong>
                        <?= htmlspecialchars($commande['titre']) ?>
                    </p>

                    <p><strong>Personnes :</strong>
                        <?= htmlspecialchars($commande['nb_personnes']) ?>
                    </p>

                    <p><strong>Prix total :</strong>
                        <?= number_format($commande['prix_total'], 2) ?> €
                    </p>

                    <p>
                        <strong>Statut :</strong>
                        <span class="status <?= $commande['statut']; ?>">
                            <?= ucfirst($commande['statut']) ?>
                        </span>
                    </p>

                    <?php if ($commande['statut'] === 'livree'): ?>
                        <a class="btn"
                           href="index.php?page=avis-create&id=<?= $commande['id_commande'] ?>">
                            Laisser un avis
                        </a>
                    <?php endif; ?>

                    <?php if ($commande['statut'] === 'en_attente'): ?>
                        <a class="btn danger"
                           href="index.php?page=commande-cancel&id=<?= $commande['id_commande'] ?>">
                            Annuler
                        </a>
                    <?php endif; ?>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <p>Vous n’avez aucune commande.</p>

        <?php endif; ?>

    </div>
</section>

<?php require __DIR__ . '/../layout/footer.php'; ?>