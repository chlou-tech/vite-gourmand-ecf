<?php require __DIR__ . '/../layout/header.php'; ?>

<section>

    <h2 class="page-title"><?= htmlspecialchars($menu['titre']) ?></h2>

    <div class="detail-card">

        <p class="menu-description">
            <?= htmlspecialchars($menu['description']) ?>
        </p>

        <div class="menu-info">
            <p><strong>👥 Minimum :</strong> <?= $menu['nb_personnes_min'] ?> personnes</p>
            <p><strong>💰 Prix :</strong> <?= number_format($menu['prix_base'], 2) ?> €</p>
            <p><strong>🎨 Thème :</strong> <?= htmlspecialchars($menu['theme']) ?></p>
            <p><strong>🥗 Régime :</strong> <?= htmlspecialchars($menu['regime']) ?></p>
            <p><strong>📦 Stock disponible :</strong> <?= $menu['stock'] ?></p>
        </div>

        <div class="menu-conditions">
            <h3>Conditions</h3>
            <p><?= nl2br(htmlspecialchars($menu['conditions'])) ?></p>
        </div>

        <div class="menu-plats">
            <h3>Plats inclus</h3>

            <?php if (!empty($plats)): ?>
                <?php foreach ($plats as $plat): ?>
                    <div class="plat-item">
                        <strong><?= htmlspecialchars($plat['nom']) ?></strong>
                        (<?= htmlspecialchars($plat['type_plat']) ?>)

                        <?php if (!empty($plat['allergenes'])): ?>
                            <div class="allergenes">
                                <?php foreach ($plat['allergenes'] as $allergene): ?>
                                    <span class="badge">
                                        <?= htmlspecialchars($allergene['nom']) ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>

        </div>

        <br>

        <?php if ($menu['stock'] > 0): ?>

    <?php if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1): ?>

        <!-- Utilisateur connecté -->
        <a class="btn"
           href="index.php?page=commande-create&id_menu=<?= $menu['id_menu'] ?>">
            Commander ce menu
        </a>

    <?php else: ?>

        <!-- Visiteur non connecté -->
        <a class="btn"
           href="index.php?page=login">
            Commander ce menu
        </a>

    <?php endif; ?>

<?php else: ?>

    <p style="color:red;"><strong>Menu indisponible (stock épuisé)</strong></p>

<?php endif; ?>

        <a class="btn" href="index.php?page=menus">Retour</a>

    </div>

</section>

<?php require __DIR__ . '/../layout/footer.php'; ?>