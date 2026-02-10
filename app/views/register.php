<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>

<h1>Créer un compte</h1>

<?php if (!empty($error)) : ?>
    <p style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="post">
    <label>Nom</label><br>
    <input type="text" name="nom" required><br><br>

    <label>Prénom</label><br>
    <input type="text" name="prenom" required><br><br>

    <label>Email</label><br>
    <input type="email" name="email" required><br><br>

    <label>Mot de passe</label><br>
    <input type="password" name="password" required><br><br>

    <label>Confirmation du mot de passe</label><br>
    <input type="password" name="password_confirm" required><br><br>

    <button type="submit">S’inscrire</button>
</form>

<p>
    Déjà un compte ?
    <a href="/Vite&Gourmand/public/index.php?page=login">Se connecter</a>
</p>

</body>
</html>
