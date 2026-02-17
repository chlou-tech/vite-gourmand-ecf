<?php require __DIR__ . '/../layout/header.php'; ?>

<h1 class="page-title">Créer une commande</h1>

<div class="form-container">
    <form method="post">

        <label>Choisir un menu</label>
        <select name="id_menu" required>
            <?php foreach ($menus as $menu): ?>
                <option value="<?= $menu['id_menu'] ?>">
                    <?= htmlspecialchars($menu['titre']) ?> - <?= $menu['prix_base'] ?> €
                </option>
            <?php endforeach; ?>
        </select>

        <label>Date de prestation</label>
        <input type="date" name="date_prestation" required>

        <label>Heure de livraison</label>
        <input type="time" name="heure_livraison">

        <label>Adresse de livraison</label>
        <textarea name="adresse_livraison" required></textarea>

        <label>Nombre de personnes</label>
        <input type="number" name="nb_personnes" min="1" required>

        <button type="submit" class="btn-primary">Valider la commande</button>

    </form>
</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>