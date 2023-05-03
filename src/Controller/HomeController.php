<?php

namespace App\Controller;

use App\Model\ArticleModel;

class HomeController
{

    public function index()
    {
        // Sélection des 3 derniers articles
        $articleModel = new ArticleModel();
        $articles = $articleModel->getAllArticles();


        // Messages flash
        if (array_key_exists('flash', $_SESSION) && $_SESSION['flash']) {
            $flashMessage = $_SESSION['flash'];
            $_SESSION['flash'] = null;
        }

        // Affichage : inclusion du template
        $pageTitle = "Bienvenue sur mon Blog !";
        $template = 'accueil';
        include '../templates/base.phtml';
    }
}
