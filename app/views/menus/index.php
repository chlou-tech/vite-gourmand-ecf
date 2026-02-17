<?php require __DIR__ . '/../layout/header.php'; ?>

<section>
    <h2>Nos menus</h2>

    <!-- ===================== -->
    <!-- 🔎 FILTRES -->
    <!-- ===================== -->

    <div class="filters">

        <form method="get">
            <input type="hidden" name="page" value="menus">

            <label>Prix maximum :</label>
            <input type="number" name="prix_max" step="0.01">

            <label>Thème :</label>
            <input type="text" name="theme">

            <label>Régime :</label>
            <input type="text" name="regime">

            <label>Minimum personnes :</label>
            <input type="number" name="nb_personnes_min">

            <button type="submit" class="btn">Filtrer</button>
        </form>

    </div>

    <br>

    <!-- ===================== -->
    <!-- 📋 LISTE DES MENUS -->
    <!-- ===================== -->

    <div class="card-container">

        <?php if (!empty($menus)): ?>

            <?php foreach ($menus as $menu): ?>

                <div class="card">

                    <h3><?= htmlspecialchars($menu['titre']) ?></h3>

                    <p>
                        <?= htmlspecialchars($menu['description']) ?>
                    </p>

                    <p>
                        👥 Minimum : <?= htmlspecialchars($menu['nb_personnes_min']) ?> personnes
                    </p>

                    <p>
                        🎨 Thème : <?= htmlspecialchars($menu['theme']) ?>
                    </p>

                    <p>
                        🥗 Régime : <?= htmlspecialchars($menu['regime']) ?>
                    </p>

                    <p class="price">
                        <?= number_format($menu['prix_base'], 2) ?> €
                    </p>

                    <a class="btn" href="index.php?page=menu&id=<?= $menu['id_menu'] ?>">
                        Voir le détail
                    </a>

                </div>

            <?php endforeach; ?>

        <?php else: ?>

            <p>Aucun menu ne correspond aux critères sélectionnés.</p>

        <?php endif; ?>

    </div>

</section>

<?php require __DIR__ . '/../layout/footer.php'; ?>