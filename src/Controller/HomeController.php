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

        // Affichage : inclusion du template
        $pageTitle = "Bienvenue sur mon Blog !";
        $template = 'accueil';
        include '../templates/base.phtml';
    }
}
