<?php

// Démarrage de la session
session_start();

// Inclusion de l'autoloader de composer
require 'vendor/autoload.php';

// Inclusion de la config
require 'config.php';

// Inclusion des dépendances
require 'functions.php';

// Validation du paramètre id de l'URL
if (!array_key_exists('id', $_GET) || !$_GET['id'] || !ctype_digit($_GET['id'])) {
    http_response_code(404);
    echo 'Article introuvable';
    exit;  // Fin de l'exécution du script PHP
}

// Récupération du paramètre id de l'URL
$idArticle = (int) $_GET['id'];

$errors = [];

// Traitement du formulaire d'ajout de commentaire
if (!empty($_POST)) {

    // 1. Récupération des données du formulaire
    $nickname = $_POST['nickname'];
    $content = $_POST['content'];

    // 2. Validation des données
    $errors = validateCommentForm($nickname, $content);


    // 3. Traitement des données
    if (empty($errors)) {

        // Insertion des données
        addComment($nickname, $content, $idArticle);

        // @TODO message flash
        $_SESSION['flashbag'] = 'Votre commentaire a bien été ajouté !';

        // Redirection vers la page Article
        header('Location: article.php?id=' . $idArticle);
        exit;
    }
}

// Récupération de l'article à afficher
$articlesId = getArticleId($idArticle);

// Vérification de l'existance de l'article
if (!$articlesId) {
    http_response_code(404);
    echo 'Article introuvable (id ' . $idArticle . ')';
    exit;  // Fin de l'exécution du script PHP
}


///////////////
// AFFICHAGE //
///////////////

// Sélection des commentaires associés à l'article pour les afficher
$comments = getCommentsByArticleId($idArticle);

// Récupérer le message flash le cas échéant
if (array_key_exists('flashbag', $_SESSION) && $_SESSION['flashbag']) {

    $flashMessage = $_SESSION['flashbag'];
    $_SESSION['flashbag'] = null;
}


// Affichage : inclusion du template
$pageTitle = $articlesId['title'];
$template = 'article';
include 'base.phtml';
