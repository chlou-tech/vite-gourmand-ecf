<h1>Liste des plats</h1>

<ul>
<?php foreach ($plats as $plat): ?>
    <li>
    <strong><?= htmlspecialchars($plat['nom']) ?></strong>
    (<?= htmlspecialchars($plat['type_plat']) ?>)

        <?php if (!empty($plat['allergenes'])): ?>
            <br>Allergènes :
            <?php foreach ($plat['allergenes'] as $allergene): ?>
                <?= htmlspecialchars($allergene['nom']) ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </li>
    <br>
<?php endforeach; ?>
</ul>