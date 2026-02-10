<h1>Créer un plat</h1>

<form method="post">
    <input name="nom" placeholder="Nom du plat" required><br>
    <textarea name="description"></textarea><br>
    <input type="number" step="0.01" name="prix" required><br>

    <h3>Associer à des menus</h3>
    <?php foreach ($menus as $menu): ?>
        <label>
            <input type="checkbox" name="menus[]" value="<?= $menu['id_menu'] ?>">
            <?= htmlspecialchars($menu['titre']) ?>
        </label><br>
    <?php endforeach; ?>

    <br>
    <button type="submit">Créer</button>
</form>
