<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<h1 id="commentaires">Billet simple pour l'Alaska</h1>

<div class="news">
    <h3 class="titrepost">
        <?= htmlspecialchars($post['title']) ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    
    <p>
        <?= /*nl2br(htmlspecialchars(*/$post['content'] ?>
    </p>
    <?php
    if($_SESSION['droit'] == 1){
        ?>
        <em><a href="index.php?action=deletePost&amp;id=<?= $post['id'] ?>" class="crud">Supprimer le post</a></em>
        <em><a href="index.php?action=updateBillet&amp;id=<?= $data['id'] ?>#majbillet" class="crud">update</a></em>
     <?php
     }

        ?>
</div>

<div class="blog">
<h2>Commentaires</h2>
<?php 
?>
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
        <input type="submit" />
    </div>
</form>

<?php }
elseif(!$_SESSION){
    echo 'veuillez vous connecté pour poster un msg';
}


while ($comment = $comments->fetch())
{
    ?>
    <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <p><?= $comment['ID'] ?></p>
    <em><a href="index.php?action=deleteCom&amp;id=<?= $comment['ID']?>&amp;postid=<?= $post['id'] ?>" class="crud">Supprimer le commentaire</a></em>
         <?php
}
?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>




