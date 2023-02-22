<?php
// Inclusion de l'autoloader de composer
require 'vendor/autoload.php';

// Inclusion de la config
require 'config.php';

// Inclusion des dépendances
require 'functions.php';

// Sélection des 3 derniers articles
$articles = getAllArticles();

// Affichage : inclusion du template
$pageTitle = "Bienvenue sur mon Blog !";
$template = 'accueil';
include 'base.phtml';
