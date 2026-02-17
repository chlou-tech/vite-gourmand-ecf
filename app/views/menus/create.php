<?php require __DIR__ . '/../layout/header.php'; ?>

<h1 class="page-title">Créer un menu</h1>

<div class="form-container">

<form method="post">

    <label>Titre :</label>
    <input type="text" name="titre" required>

    <label>Description :</label>
    <textarea name="description" required></textarea>

    <label>Thème :</label>
    <input type="text" name="theme">

    <label>Régime :</label>
    <input type="text" name="regime">

    <label>Nombre minimum de personnes :</label>
    <input type="number" name="nb_personnes_min" required>

    <label>Prix de base :</label>
    <input type="number" step="0.01" name="prix_base" required>

    <label>Conditions :</label>
    <textarea name="conditions"></textarea>

    <button type="submit" class="btn-primary">Créer</button>

</form>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
