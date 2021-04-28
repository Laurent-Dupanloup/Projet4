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
        return $comments;
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

    public function cancelReport($id)
    {
        $db = $this->dbConnect();
         $req = $db->prepare('UPDATE comments
           SET signalement = 0 WHERE id = :id');
        $cancelSignal = $req->execute(array('id' => $id));
        return $cancelSignal;
    }

    public function reportMsgList()
    {
        $db = $this->dbConnect();
         $listMsg = $db->query('SELECT comments.id as ID, comments.post_id, comments.comment, comments.signalement, comments.author_id, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\')AS comment_date_fr, membre.id, membre.pseudo FROM comments INNER JOIN membre 
    ON comments.author_id = membre.id WHERE comments.signalement = 1 ORDER BY comment_date DESC');
        return $listMsg;
    }
}

