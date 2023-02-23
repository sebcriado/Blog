<?php


/**
 * Connexion à la base de données
 */
function dataBaseConnect()
{

    // Construction du Data Source Name
    $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';charset=utf8';

    // Tableau d'options pour la connexion PDO
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    // Création de la connexion PDO (création d'un objet PDO)
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
    $pdo->exec('SET NAMES UTF8');

    return $pdo;
}

/**
 * Sélectionne tous les articles
 */
function getAllArticles()
{
    $pdo = dataBaseConnect();

    $sql = 'SELECT *
            FROM article AS A
            INNER JOIN category AS C
            ON A.categoryId = C.idCategory
            ORDER BY createdAt DESC 
            LIMIT 3';

    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

function getAllCategory()
{
    $pdo = dataBaseConnect();

    $sql = 'SELECT *
            FROM category
            ORDER BY name';

    $query = $pdo->prepare($sql);
    $query->execute();

    return $query->fetchAll();
}

/**
 * Sélectionne un article à partir de son id
 */

function getArticleId(int $idArticle)
{
    $pdo = dataBaseConnect();
    $sql = 'SELECT * 
            FROM article AS A
            INNER JOIN category AS C 
            ON A.categoryId = C.idCategory
            WHERE idArticle = ?';

    $query = $pdo->prepare($sql);
    $query->execute([$idArticle]);

    $result = $query->fetch();
    return $result;
}
