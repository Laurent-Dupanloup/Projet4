<?php $title = 'Blog pour un écrivain'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<h3>Creation du billet</h3>
<form action="index.php?action=createBillet" method="post">
    <div>
        <label for="title">titre</label><br />
        <input type="text" id="title" name="title" required/>
    </div>
    <div>
        <!--<label for="content">texte</label><br />
        <input type="text" id="content" name="content" required/>-->
        <!--<input id="content"/>-->
        <textarea id="mytextarea" name="mytextarea">test</textarea>
        <!--<input id="mytextarea"/>-->
    </div>
    <div>
        <input type="submit" value="Valider"/>
    </div>
</form>

<!--<p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p>-->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>