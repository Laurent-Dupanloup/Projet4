<?php $title = 'Blog pour un écrivain'; ?>

<?php ob_start(); ?>
<h1 class="mesh1">Billet simple pour l'Alaska</h1>
<h3 class="mesh3" id="creerbillet">Creation du billet</h3>
<div class="divform">
<form action="index.php?action=createBillet" method="post">
    <div>
        <label for="title">Titre</label><br />
        <input type="text" id="title" name="title" required/>
    </div>
    <div>
        <textarea id="mytextarea" name="mytextarea">test</textarea>
    </div>
    <div>
        <input type="submit" value="Valider"/>
    </div>
</form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>