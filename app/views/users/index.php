<?php require __DIR__ . '/../layout/header.php'; ?>

<div class="main-container">

    <h1 class="page-title">👥 Gestion des utilisateurs</h1>

    <a class="btn-primary" href="index.php?page=user-create">
        ➕ Nouvel utilisateur
    </a>

    <div class="card-grid">

        <?php foreach ($users as $user): ?>

            <div class="card user-card">

                <div class="user-header">
                    <h3>
                        <?= htmlspecialchars($user['prenom']) ?>
                        <?= htmlspecialchars($user['nom']) ?>
                    </h3>

                    <?php
                        $roleLabel = match($user['id_role']) {
                            1 => "Utilisateur",
                            2 => "Employé",
                            3 => "Administrateur"
                        };

                        $roleClass = match($user['id_role']) {
                            1 => "badge-user",
                            2 => "badge-employee",
                            3 => "badge-admin"
                        };
                    ?>

                    <span class="role-badge <?= $roleClass ?>">
                        <?= $roleLabel ?>
                    </span>
                </div>

                <p class="user-email">
                    <?= htmlspecialchars($user['email']) ?>
                </p>

                <div class="button-group">

                    <a class="btn-small" href="index.php?page=user-update-role&id=<?= $user['id_user'] ?>&role=1">
                        Utilisateur
                    </a>

                    <a class="btn-small" href="index.php?page=user-update-role&id=<?= $user['id_user'] ?>&role=2">
                        Employé
                    </a>

                    <a class="btn-small" href="index.php?page=user-update-role&id=<?= $user['id_user'] ?>&role=3">
                        Admin
                    </a>

                    <a class="btn-danger"
                        href="index.php?page=user-delete&id=<?= $user['id_user'] ?>"
                        onclick="return confirm('Supprimer cet utilisateur ?');">
                        Supprimer
                    </a>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</div>

<?php require __DIR__ . '/../layout/footer.php'; ?>
