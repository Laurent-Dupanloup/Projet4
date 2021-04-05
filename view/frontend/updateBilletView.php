<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<h3>mise à jour du post</h3>
<?=$unPost2['id'] ?>
<form action="index.php?action=updateBilletComfirm&amp;id=<?= $unPost2['id'] ?>" method="post">
    <div>
        <label for="title">titre</label><br />
        <input type="text" id="title" name="title" required/>
    </div>
    <div>
    <div class="news">
        <h3>
            <?= htmlspecialchars($unPost2['title']) ?>
            <em>le <?= $unPost2['creation_date_fr'] ?></em>
        </h3>
        
        <div class="newstext">
            <textarea id="mytextarea" name="mytextarea"><?= /*nl2br(htmlspecialchars*/$unPost2['content'] ?></textarea>
            <br />
        </div>
    </div>
      <!--<textarea id="mytextarea" name="mytextarea">test</textarea>-->
    </div>
    <div>
        <input type="submit" value="Valider"/>
    </div>
</form>
<?php

//$unPost->closeCursor();
?>
<!--<p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>-->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>