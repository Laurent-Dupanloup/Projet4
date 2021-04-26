<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>

<div class="news">
    <h3 class="titrepost">
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
            <?= /*nl2br(htmlspecialchars(*/$post['content'] ?>
    </p>
</div>
<div class="blog">
<h2 id="commentaires">Commentaires</h2>
<?php 
    if($_SESSION){
?>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label><?=$_SESSION['pseudo']?></label><br />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" >
    </div>
</form>

<?php }
elseif(!$_SESSION){
    echo 'veuillez vous connecté pour poster un msg';
}

while ($comment = $comments->fetch())
{
    if(!$_SESSION) { 
        ?>
    <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <?php
    }   
    elseif($_SESSION['droit']==0 || $_SESSION['droit'] ==1)
    {
        ?>
        <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
<?php
        if($_SESSION['id'] == $comment['author_id']){
?>
         <em><a href="index.php?action=deleteCom&amp;id=<?= $comment['ID'] ?>&amp;postid=<?= $post['id'] ?>" class="crud">Supprimer le commentaire</a></em>
         <?php
     }
         else{
            ?>
            <em><a href="index.php?action=signalementMsg&amp;id=<?= $comment['ID'] ?>" class="crud">signaler le message</a></em>
    <?php
         }
     }
    }
//&amp;postid=<?= $comment['post_id'] ?
?>
</div> 
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>




