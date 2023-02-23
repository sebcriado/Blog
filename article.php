<?php
// Inclusion de l'autoloader de composer
require 'vendor/autoload.php';

// Inclusion de la config
require 'config.php';

// Inclusion des dépendances
require 'functions.php';

$idArticle = $_GET['id'];
$articlesId = getArticleId($idArticle);




// Affichage : inclusion du template
$pageTitle = "Article";
$template = 'article';
include 'base.phtml';
