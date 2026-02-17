<?php require __DIR__ . '/../layout/header.php'; ?>

<h1 class="page-title">Laisser un avis</h1>

<div class="form-container">

    <form method="post">

        <label>Note</label>
        <select name="note" required>
            <option value="">Choisir une note</option>
            <option value="1">1 ⭐</option>
            <option value="2">2 ⭐⭐</option>
            <option value="3">3 ⭐⭐⭐</option>
            <option value="4">4 ⭐⭐⭐⭐</option>
            <option value="5">5 ⭐⭐⭐⭐⭐</option>
        </select>

        <label>Commentaire</label>
        <textarea name="commentaire" rows="4" required></textarea>

        <button type="submit" class="btn-primary">
            Envoyer l’avis
        </button>

    </form>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
