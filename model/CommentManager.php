<?php
require_once("model/Manager.php");

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT comments.id as ID, comments.comment, comments.signalement, comments.author_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\')AS comment_date_fr, membre.id, membre.pseudo FROM comments INNER JOIN membre 
    ON comments.author_id = membre.id WHERE comments.post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;//'SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC')

        /*ancienne requete 
        SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\')AS comment_date_fr, author_id FROM comments WHERE post_id = ? ORDER BY comment_date DESC
        */

        //jointure
        /*SELECT id, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\')AS comment_date_fr, author_id FROM comments INNER JOIN membre 
    ON comments.author_id = membre.id WHERE post_id = ? ORDER BY comment_date DESC*/
/*
    clef etrangere pour les msg
    ALTER TABLE comments
    ADD [CONSTRAINT clef_etrangere_author]  -- On donne un nom à la clé (facultatif)
    FOREIGN KEY author_id             -- La colonne sur laquelle on ajoute la clé
    REFERENCES membre(id)  -- La table et la colonne de référence
     ON DELETE SET NULL   
        -- N'oublions pas de remettre le ON DELETE !
    ON UPDATE CASCADE;   


    ALTER TABLE comments
    ADD [CONSTRAINT clef_etrangere_author]
    FOREIGN KEY author_id
    REFERENCES membre(id);
     ON DELETE SET NULL   
    ON UPDATE CASCADE;   

    
    clef etrangere pour les billets

    ALTER TABLE comments
    ADD [CONSTRAINT clef_etrangere_postid]
    FOREIGN KEY post_id
    REFERENCES posts(id);
     ON DELETE SET NULL   
    ON UPDATE CASCADE;


*/

    }

    public function postComment($postid, $comment, $author_id)
    {
        $db = $this->dbConnect();
        $signalement = 0;
        $comments = $db->prepare('INSERT INTO comments(post_id, comment, signalement, author_id, comment_date) VALUES(?, ?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postid, $comment, $signalement, $author_id));

        return $affectedLines;
    }

    public function comDelete($id ,$postid)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = :id');
        $req->execute(array(
            'id' => $id));
        return $req;
        
    }

    public function reportMsg($id)
    {
         $db = $this->dbConnect();
         $req = $db->prepare('UPDATE comments
           SET signalement = 1 WHERE id = :id');
        $signal = $req->execute(array('id' => $id));
        return $signal;
    }
}

