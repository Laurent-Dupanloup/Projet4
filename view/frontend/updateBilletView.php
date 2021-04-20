<?php $title = 'Blog pour un écrivain'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<h3>mise à jour du post</h3>
<div class="divform">
<form action="index.php?action=updateBilletComfirm&amp;id=<?= $unPost2['id'] ?>" method="post">
    <div>
        <!--<label for="title"></label><br />-->
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($unPost2['title']) ?>" required/>
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
        <input id="btnvalider" type="submit" value="Valider"/>
    </div>
</form>
</div>
<?php

//$unPost->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>