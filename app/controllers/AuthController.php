<?php

require_once __DIR__ . '/../models/User.php';

class AuthController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if (empty($email) || empty($password)) {
                $error = "Tous les champs sont obligatoires";
                require_once __DIR__ . '/../views/login.php';
                return;
            }

            $userModel = new User($this->pdo);
            $user = $userModel->findByEmail($email);

            if (!$user || !password_verify($password, $user['mot_de_passe'])) {
                $error = "Identifiants invalides";
                require_once __DIR__ . '/../views/login.php';
                return;
            }

            $_SESSION['user'] = [
                'id' => $user['id_user'],
                'email' => $user['email'],
                'role' => $user['id_role']
            ];

            header('Location: /Vite&Gourmand/public/index.php');
            exit;
        }

        require_once __DIR__ . '/../views/login.php';
    }

public function register()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nom = trim($_POST['nom'] ?? '');
        $prenom = trim($_POST['prenom'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';
        $passwordConfirm = $_POST['password_confirm'] ?? '';

        if (!$nom || !$prenom || !$email || !$password || !$passwordConfirm) {
            $error = "Tous les champs sont obligatoires";
            require_once __DIR__ . '/../views/register.php';
            return;
        }

        if ($password !== $passwordConfirm) {
            $error = "Les mots de passe ne correspondent pas";
            require_once __DIR__ . '/../views/register.php';
            return;
        }

        $userModel = new User($this->pdo);

        if ($userModel->emailExists($email)) {
            $error = "Un compte existe déjà avec cet email";
            require_once __DIR__ . '/../views/register.php';
            return;
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $userModel->create([
            'nom' => $nom,
            'prenom' => $prenom,
            'email' => $email,
            'mot_de_passe' => $hashedPassword
        ]);

        header('Location: /Vite&Gourmand/public/index.php?page=login');
        exit;
    }

    require_once __DIR__ . '/../views/register.php';
}
}