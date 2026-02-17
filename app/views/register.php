<?php require __DIR__ . '/layout/header.php'; ?>

<section>

    <h2 class="page-title">Inscription</h2>

    <div class="auth-container">

        <form method="post" class="auth-form">

            <label>Nom :</label>
            <input type="text" name="nom" required>

            <label>Prénom :</label>
            <input type="text" name="prenom" required>

            <label>Email :</label>
            <input type="email" name="email" required>

            <label>Mot de passe :</label>
            <input type="password" name="mot_de_passe" required>

            <button type="submit" class="btn">S’inscrire</button>

        </form>

    </div>

</section>

<?php require __DIR__ . '/layout/footer.php'; ?>