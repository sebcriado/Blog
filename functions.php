<?php



function getAllCategory()
{
    // Connexion à la BDD
    $db = new Database();

    $sql = 'SELECT *
            FROM category
            ORDER BY name';

    return $db->getAllResults($sql);
}

// /**
//  * Sélectionne un article à partir de son id
//  */

// function getArticleId(int $idArticle)
// {
//     // Connexion à la BDD
//     $db = new Database();

//     $sql = 'SELECT * 
//             FROM article AS A
//             INNER JOIN category AS C 
//             ON A.categoryId = C.idCategory
//             WHERE idArticle = ?';

//     return $db->getOneResult($sql, [$idArticle]);
// }




function validateCommentForm(string $nickname, string $content)
{
    $errors = [];

    if (!$nickname) {
        $errors['nickname'] = 'Le champ "pseudo" est obligatoire';
    }

    if (strlen($content) < 10) {
        $errors['content'] = 'Le commentaire doit comporter au moins 10 caractères';
    }

    return $errors;
}
