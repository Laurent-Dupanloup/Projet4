<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= nl2br(htmlspecialchars($post['content'])) ?>
    </p>
</div>

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
    if($_SESSION){
?>

<form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
    <div>
        <label for="author"><?=$_SESSION['pseudo']?></label><br />
        <!--<input type="text" id="author" name="author" />-->
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php }
elseif(!$_SESSION){
    echo 'veuillez vous connecté pour poster un msg';
}

//<?php
while ($comment = $comments->fetch())
{
?>
<?php
    if(!$_SESSION || $_SESSION['droit'] ==0){
        ?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <?php
    }   
    elseif ($_SESSION['droit']==1)
    {
        ?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <em><a href="index.php?action=deleteCom&amp;id=<?= $comment['id'] ?>">Supprimer le commentaire</a></em>
<?php
}
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>




