<h1>Menus disponibles</h1>

<ul>
<?php foreach ($menus as $menu): ?>
    <li>
        <strong><?= htmlspecialchars($menu['titre']) ?></strong>
        - <?= htmlspecialchars($menu['prix_base']) ?> €
        <a href="index.php?page=menu&id=<?= $menu['id_menu'] ?>">Voir</a>
    </li>
<?php endforeach; ?>
</ul>
