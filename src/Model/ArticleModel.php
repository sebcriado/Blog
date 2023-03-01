<?php
//1. Déclaration du namespace
namespace App\Model;

//2. Import de classes
use App\Core\AbstractModel;
use App\Entity\Article;
use App\Entity\Category;

class ArticleModel extends AbstractModel
{


    /**
     * Sélectionne tous les articles
     */
    function getAllArticles()
    {
        $sql = 'SELECT *
                FROM article AS A
                INNER JOIN category AS C
                ON A.categoryId = C.idCategory
                ORDER BY createdAt DESC 
                LIMIT 3';

        $results =  $this->db->getAllResults($sql);

        $articles = [];
        foreach ($results as $result) {
            $result['category'] = new Category($result['categoryId'], $result['name']);
            $articles[] = new Article($result);
        }

        return $articles;
    }

    /**
     * Sélectionne un article à partir de son id
     */
    function getArticleId(int $idArticle)
    {
        $sql = 'SELECT * 
            FROM article AS A
            INNER JOIN category AS C 
            ON A.categoryId = C.idCategory
            WHERE idArticle = ?';

        $result = $this->db->getOneResult($sql, [$idArticle]);

        if (empty($result)) {
            return null;
        }

        $result['category'] = new Category($result['categoryId'], $result['name']);

        return new Article($result);
    }
}
