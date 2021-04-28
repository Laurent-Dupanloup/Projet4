<?php $title = 'Blog pour un écrivain'; ?>

<?php ob_start(); ?>
<h1 class="mesh1">Billet simple pour l'Alaska</h1>
<h3 class="mesh3" id="majbillet">mise à jour du post</h3>
<div class="divform">
<form action="index.php?action=updateBilletComfirm&amp;id=<?= $unPost2['id'] ?>" method="post">
    <div>
        <label for="title">Titre</label><br />
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($unPost2['title']) ?>" required/>
    </div>
        <div>
            <textarea id="mytextarea" name="mytextarea"><?= $unPost2['content'] ?></textarea>
        </div>
    <div>
        <input id="btnvalider" type="submit" value="Valider"/>
    </div>
</form>
</div> 
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>