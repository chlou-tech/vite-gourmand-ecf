<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="main-container">

    <h1 class="page-title">➕ Créer un utilisateur</h1>

    <div class="form-card">

        <form method="POST">

            <label>Nom</label>
            <input type="text" name="nom" required>

            <label>Prénom</label>
            <input type="text" name="prenom" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Mot de passe</label>
            <input type="password" name="mot_de_passe" required>

            <label>Rôle</label>
            <select name="id_role" required>
                <option value="1">Utilisateur</option>
                <option value="2">Employé</option>
                <option value="3">Administrateur</option>
            </select>

            <button class="btn-primary">Créer</button>

        </form>

    </div>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
