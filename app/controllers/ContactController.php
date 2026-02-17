<?php

class ContactController
{
    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $titre = $_POST['titre'] ?? '';
            $description = $_POST['description'] ?? '';
            $email = $_POST['email'] ?? '';

            $to = "contact@vite-gourmand.fr"; // email entreprise
            $subject = "Nouveau message : " . $titre;

            $message = "
                Email de l'expéditeur : $email

                Message :
                $description
            ";

            $headers = "From: $email";

            mail($to, $subject, $message, $headers);

            $success = true;
        }

        require __DIR__ . '/../views/contact.php';
    }
}