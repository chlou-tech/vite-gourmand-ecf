<h1>Liste des plats</h1>

<ul>
<?php foreach ($plats as $plat): ?>
    <li>
        <?= htmlspecialchars($plat['nom']) ?> –
        <?= htmlspecialchars($plat['prix']) ?> €
    </li>
<?php endforeach; ?>
</ul>

<a href="index.php?page=plat-create">Créer un plat</a>
