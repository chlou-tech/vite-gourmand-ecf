<?php require __DIR__ . '/../layout/header.php'; ?>

<h1 class="page-title">Créer un plat</h1>

<div class="form-container">

<form method="post">

    <label>Nom du plat :</label>
    <input type="text" name="nom" required>

    <label>Type de plat :</label>
    <input type="text" name="type_plat" required>

    <label>Description :</label>
    <textarea name="description"></textarea>

    <h3>Associer à des menus</h3>

    <?php foreach ($menus as $menu): ?>
        <label>
            <input type="checkbox" name="menus[]" value="<?= $menu['id_menu'] ?>">
            <?= htmlspecialchars($menu['titre']) ?>
        </label><br>
    <?php endforeach; ?>

    <h3>Allergènes</h3>

    <?php foreach ($allergenes as $allergene): ?>
        <label>
            <input type="checkbox" name="allergenes[]" value="<?= $allergene['id_allergene'] ?>">
            <?= htmlspecialchars($allergene['nom']) ?>
        </label><br>
    <?php endforeach; ?>

    <button type="submit" class="btn-primary">Créer</button>

</form>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
