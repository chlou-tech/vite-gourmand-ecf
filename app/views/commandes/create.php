<h1>Créer une commande</h1>

<form method="post">

    <label>Menu :</label>
    <select name="id_menu">
        <?php foreach ($menus as $menu): ?>
            <option value="<?= $menu['id_menu'] ?>">
                <?= htmlspecialchars($menu['titre']) ?>
            </option>
        <?php endforeach; ?>
    </select><br><br>

    <input type="date" name="date_prestation" required><br>
    <input type="time" name="heure_livraison" required><br>
    <input type="text" name="adresse_livraison" placeholder="Adresse"><br>
    <input type="number" name="nb_personnes" placeholder="Nombre de personnes"><br>

    <button type="submit">Commander</button>
</form>
