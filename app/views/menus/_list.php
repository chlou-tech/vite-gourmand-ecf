<?php if (!empty($menus)): ?>

    <?php foreach ($menus as $menu): ?>

        <div class="card">
            <h3><?= htmlspecialchars($menu['titre']) ?></h3>

            <p><?= htmlspecialchars($menu['description']) ?></p>

            <p>👥 Minimum : <?= $menu['nb_personnes_min'] ?> personnes</p>
            <p>🎨 Thème : <?= $menu['theme'] ?></p>
            <p>🥗 Régime : <?= $menu['regime'] ?></p>

            <p class="price">
                <?= number_format($menu['prix_base'], 2) ?> €
            </p>

            <a class="btn" href="index.php?page=menu&id=<?= $menu['id_menu'] ?>">
                Voir le détail
            </a>
        </div>

    <?php endforeach; ?>

<?php else: ?>

    <p>Aucun menu trouvé</p>

<?php endif; ?>
