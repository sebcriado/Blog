<?php
// Inclusion de l'autoloader de composer
require 'vendor/autoload.php';

// Inclusion de la config
require 'config.php';

// Inclusion des dépendances
require 'src/Core/AbstractModel.php';
require 'src/Model/ArticleModel.php';
require 'src/Core/Database.php';
require 'functions.php';

// Sélection des 3 derniers articles
$articleModel = new ArticleModel();
$articles = $articleModel->getAllArticles();

// Affichage : inclusion du template
$pageTitle = "Bienvenue sur mon Blog !";
$template = 'accueil';
include 'base.phtml';
