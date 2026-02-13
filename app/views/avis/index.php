<h1>Gestion des avis</h1>

<ul>
<?php foreach ($avis as $unAvis): ?>
    <li>
        Note : <?= htmlspecialchars($unAvis['note']) ?> / 5 <br>
        Commentaire : <?= htmlspecialchars($unAvis['commentaire']) ?> <br>
        Statut : <?= $unAvis['valide'] ? 'Validé' : 'En attente' ?>

        <?php if (!$unAvis['valide']): ?>
            <br>
            <a href="index.php?page=avis-validate&id=<?= $unAvis['id_avis'] ?>&status=1">
                Valider
            </a>
            |
            <a href="index.php?page=avis-validate&id=<?= $unAvis['id_avis'] ?>&status=0">
                Refuser
            </a>
        <?php endif; ?>
    </li>
    <br>
<?php endforeach; ?>
</ul>

<a href="index.php?page=home">Retour</a>