<h1>Créer un plat</h1>

<form method="post">

<h3>Informations du plat</h3>

<label>Nom du plat :</label><br>
<input type="text" name="nom" required><br><br>

<label>Type de plat :</label><br>
<input type="text" name="type_plat" required><br><br>

<label>Description :</label><br>
<textarea name="description"></textarea><br><br>

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

<br>
<button type="submit">Créer</button>

</form>