<?php
session_start();

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
}
