<?php
require_once("model/Manager.php");

class PostManager extends Manager
{
    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 20');

        return $req;
    }

    public function getPost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ? ORDER BY creation_date DESC');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function addPost($title, $mytextarea)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        $newPost = $req->execute(array($title, $mytextarea));

        return $newPost;
    }

     public function deletePost($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = :id');
        $req->execute(array(
            'id' => $id));
        return $req;
        
    }

    public function getBilletEdit($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($id));
        $post2 = $req->fetch();

        return $post2;
    }

    public function majDuPost($id, $title, $content)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = ?, content = ?, creation_date = NOW() WHERE id = ?');    /*('UPDATE posts SET title, content, creation_date VALUES (?, ?, NOW())  WHERE id = :id');*/
        /*$newPost = $req->execute(array($title, $content));*/
        $newPost = $req->execute(array($title, $content, $id));
        error_reporting(E_ALL);
        ini_set('display_errors',1);//Afficher les erreurs sur la page
        print_r($db->errorInfo()); // Afficher les erreurs spécifiques à pdo
        return $newPost;
    }
}
