<?php

namespace Classes;

class DB
{
    private $host;
    private $username;
    private $pass;
    private $dbName;
    private $port;

    private $connection;

    public function __construct($host, $username, $pass, $dbName, $port)
    {
        $this->host = $host;
        $this->username = $username;
        $this->pass = $pass;
        $this->dbName = $dbName;
        $this->port = $port;

        try {
            $this->connection = new \PDO("mysql:host=".$this->host.";port=".$this->port.";dbname=".$this->dbName, $this->username, $this->pass);
            // set the PDO error mode to exception
            $this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getMenu()
    {
        $sql = "SELECT * FROM menu";
        $stm = $this->connection->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getAllArticles()
    {
        $sql = "SELECT p.id, p.title, p.perex, p.created_at, p.image, u.username, c.cat_name AS category
                FROM `posts` AS p
                INNER JOIN users AS u ON p.users_id = u.id
                INNER JOIN categories AS c ON p.categories_id = c.id
                ORDER BY p.created_at DESC";
        $stm = $this->connection->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function countArticleComments($postId)
    {
        $sql = "SELECT COUNT(id) AS numComments FROM comments WHERE posts_id = :post_id";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(':post_id', $postId);
        $stm->execute();
        $result = $stm->fetchColumn();

        return $result;
    }

    public function getArticle($postId)
    {
        $sql = "SELECT p.id, p.title, p.content, p.created_at, p.image, u.username, c.cat_name AS category
                FROM `posts` AS p
                INNER JOIN users AS u ON p.users_id = u.id
                INNER JOIN categories AS c ON p.categories_id = c.id
                WHERE p.id = :post_id
                ORDER BY p.created_at DESC";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(':post_id', $postId);
        $stm->execute();
        $result = $stm->fetch(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function getComments($postId)
    {
        $sql = "SELECT c.id, c.content, c.created_at, u.username, u.image 
                FROM comments AS c
                INNER JOIN users AS u ON c.users_id = u.id
                WHERE c.posts_id = :post_id
                ORDER BY c.created_at ASC";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue('post_id', $postId);
        $stm->execute();
        $result = $stm->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }

    public function insertPostComment($postId, $userName, $content)
    {
        $dateTime = date("Y-m-d H:i:s", time());

        $sqlUser = "SELECT id FROM users WHERE username = :username";
        $stmUser = $this->connection->prepare($sqlUser);
        $stmUser->bindValue(":username", $userName);
        $stmUser->execute();
        $userId = $stmUser->fetchColumn();

        $sql = "INSERT INTO comments(content, created_at, posts_id, users_id) VALUE(:content, '".$dateTime."', :post_id, :user_id)";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(':content', $content);
        $stm->bindValue(':post_id', $postId);
        $stm->bindValue(':user_id', $userId);
        $result = $stm->execute();

        return $result;

    }

    public function deletePostComment($commentId)
    {
        $sql = "DELETE FROM comments WHERE id = :id";
        $stm = $this->connection->prepare($sql);
        $stm->bindValue(":id", $commentId);
        $result = $stm->execute();

        return $result;
    }

    public function updatePostComment($commentId, $userId, $content)
    {
        $sql = "UPDATE comments SET content = '".$content."', users_id = '".$userId."' WHERE id = '".$commentId."'";
        $stm = $this->connection->prepare($sql);
        $result = $stm->execute();

        return $result;
    }

    public function getComment($commentId)
    {
        $sql = "SELECT * FROM comments WHERE id = ".$commentId;
        $stm = $this->connection->prepare($sql);
        $stm->execute();
        $comment = $stm->fetch(\PDO::FETCH_ASSOC);

        return $comment;
    }

}