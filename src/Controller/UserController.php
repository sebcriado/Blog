<?php

namespace App\Controller;

use App\Entity\User;
use App\Model\UserModel;

class UserController
{
    private UserModel $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function signup()
    {
        // Si le formulaire est soumis
        if (!empty($_POST)) {

            // 1. Récupération des données du formulaire
            $nickname = strip_tags(trim($_POST['nickname']));
            $email = strip_tags(trim($_POST['email']));
            $password = $_POST['password'];
            $passwordConfirm = $_POST['password-confirm'];

            // 2. Validation du formulaire
            $errors = $this->validateForm(
                $nickname,
                $email,
                $password,
                $passwordConfirm
            );

            // Si il n'y a pas d'erreur... 
            if (empty($errors)) {

                $hash = password_hash($password, PASSWORD_DEFAULT);

                $user = new User([
                    'nickname' => $nickname,
                    'email' => $email,
                    'password' => $hash
                ]);

                dump($user);

                // Ajout du nouvel utilisateur dans le fichier JSON
                $this->userModel->addUser($user);

                // Ajout d'un message flash en session
                $_SESSION['flash'] = 'Votre compte a été créé avec succès.';

                // Redirection vers l'index.php mais sans les données du formulaire
                // Design pattern : POST redirect GET (cf https://fr.wikipedia.org/wiki/Post-redirect-get)
                //header('Location: index.php');
                exit;
            }
        }


        // Affichage du template
        $template = 'signup';
        include '../templates/base.phtml';
    }

    private function validateForm(
        string $nickname,
        string $email,
        string $password,
        string $passwordConfirm
    ) {


        // On initialise un tableau, on stockera les messages d'erreur dedans
        $errors = [];

        // Si le champ "firstname" n'est pas rempli...
        if (!$nickname) {
            $errors['nickname'] = 'Veuillez remplir le champ "Pseudo"';
        }

        // Validation de l'email
        if (!$email) {
            $errors['email'] = 'Veuillez remplir le champ "Email"';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Veuillez remplir un email valide';
        } elseif ($this->userModel->getUserByEmail($email)) {
            $errors['email'] = 'Un compte existe déjà avec cet email';
        }

        if (strlen($password) < 8) {
            $errors['password'] = 'Le mot de passe doit comporter au moins 8 caractères';
        } elseif ($password != $passwordConfirm) {
            $errors['password-confirm'] = 'La confirmation ne correspond pas';
        }

        // On retourne le tableau d'erreurs
        return $errors;
    }
}
