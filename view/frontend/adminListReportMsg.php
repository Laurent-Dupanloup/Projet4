

<?php ob_start(); ?>
<h1>Mon super blog !</h1>


<h2>Commentaires</h2>
<!--<?php
//if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
 //   echo 'Bonjour ' . $_SESSION['pseudo'];
}
//else
//echo 'ca marche pas2';
?>-->
<?php 
echo var_dump($commentReportList);
//echo (var_dump($comments->fetch()));
//echo('$comment');
?>
<?php
while ($comment = $commentReportList->fetch())
{
    //echo var_dump($comment);
    /*if(!$_SESSION) { /*|| $_SESSION['droit'] ==0){*/
        ?>
        <p><?= htmlspecialchars($comment['post_id'])?></p>
    <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
         <em><a href="index.php?action=deleteCom&amp;id=<?= $comment['ID'] ?>&amp;postid=<?= $comment['post_id'] ?>">Supprimer le commentaire</a></em>
         <em><a href="index.php?action=signalementCancel&amp;id=<?= $comment['ID'] ?>">annuler le signalement</a></em>
         <?php
         //&amp;postid=<?= $post['id'] 
     }
    //}
//&amp;postid=<?= $comment['post_id'] ?
//}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>