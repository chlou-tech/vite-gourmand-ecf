<?php

require_once __DIR__ . '/../models/User.php';

class UserController
{
    private $userModel;

    public function __construct($pdo)
    {
        $this->userModel = new User($pdo);
    }

    public function index()
    {
        requireMinRole(3);

        $users = $this->userModel->getAll();
        require __DIR__ . '/../views/users/index.php';
    }

    public function updateRole()
    {
        requireMinRole(3);

        $id = $_GET['id'] ?? null;
        $role = $_GET['role'] ?? null;

        if ($id && in_array($role, [1,2,3])) {
            $this->userModel->updateRole($id, $role);
        }

        header('Location: index.php?page=users');
        exit;
    }

    // Création utilisateur (admin uniquement)
    public function create()
    {
        requireMinRole(3); // admin uniquement

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $passwordHash = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);

            $this->userModel->create([
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'mot_de_passe' => $passwordHash,
                'id_role' => $_POST['id_role']
            ]);

        header('Location: index.php?page=users');
        exit;
        }

        require __DIR__ . '/../views/users/create.php';
    }

    // Supprimer comptes
    public function delete()
    {
        requireMinRole(3); // admin uniquement

        $id = $_GET['id'] ?? null;

        if (!$id) {
            header('Location: index.php?page=users');
            exit;
        }

        // Récupérer l'utilisateur ciblé
        $users = $this->userModel->getAll();

        foreach ($users as $user) {
            if ($user['id_user'] == $id) {

                // Empêcher suppression d'un admin
                if ($user['id_role'] == 3) {
                    echo "Impossible de supprimer un administrateur.";
                    exit;
                }

                // Empêcher suppression de soi-même
                if ($id == $_SESSION['user']['id']) {
                    echo "Vous ne pouvez pas supprimer votre propre compte.";
                    exit;
                }
        }
    }

    $this->userModel->delete($id);

    header('Location: index.php?page=users');
    exit;
}

}
