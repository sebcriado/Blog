<?php

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

        return $this->db->getOneResult($sql, [$idArticle]);
    }
}
