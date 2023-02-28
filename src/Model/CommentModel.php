<?php

class CommentModel extends AbstractModel
{

    function addComment(string $nickname, string $content, int $idArticle)
    {

        $sql = 'INSERT INTO comment 
                (nickname, content, articleId, createdAt)
                VALUES (?,?,?,NOW())';

        $this->db->prepareAndExecute($sql, [$nickname, $content, $idArticle]);
    }

    function getCommentsByArticleId(int $idArticle)
    {

        $sql = 'SELECT *
                FROM comment
                WHERE articleId = ?
                ORDER BY createdAt DESC';

        return $this->db->getAllResults($sql, [$idArticle]);
    }
}
