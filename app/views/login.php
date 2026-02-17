<?php require __DIR__ . '/layout/header.php'; ?>

<section>

    <h2 class="page-title">Connexion</h2>

    <div class="auth-container">

        <form method="post" class="auth-form">

            <label>Email :</label>
            <input type="email" name="email" required>

            <label>Mot de passe :</label>
            <input type="password" name="password" required>

            <button type="submit" class="btn">Se connecter</button>

        </form>

    </div>

</section>

<?php require __DIR__ . '/layout/footer.php'; ?>