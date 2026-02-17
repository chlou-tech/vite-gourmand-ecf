<?php require __DIR__ . '/layout/header.php'; ?>

<section>
    <h2>Contactez-nous</h2>

    <?php if (!empty($success)): ?>
        <p style="color:green;">Votre message a été envoyé avec succès.</p>
    <?php endif; ?>

    <form method="post">

        <label>Titre :</label><br>
        <input type="text" name="titre" required><br><br>

        <label>Description :</label><br>
        <textarea name="description" required></textarea><br><br>

        <label>Votre email :</label><br>
        <input type="email" name="email" required><br><br>

        <button type="submit" class="btn">Envoyer</button>

    </form>

</section>

<?php require __DIR__ . '/layout/footer.php'; ?>