<?php

// Sélection des 3 derniers articles
$articleModel = new App\Model\ArticleModel();
$articles = $articleModel->getAllArticles();

// Affichage : inclusion du template
$pageTitle = "Bienvenue sur mon Blog !";
$template = 'accueil';
include '../templates/base.phtml';
