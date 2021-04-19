<?php $title = 'Blog pour un écrivain'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
<h3>Connexion</h3>
<form action="index.php?action=verifMember" method="post">
    <div>
        <label for="pseudo">pseudo</label><br />
        <input type="text" id="pseudo" name="pseudo" required/>
    </div>
    <div>
        <label for="mdp">mot de passe</label><br />
        <input type="password" id="mdp" name="mdp" required/>
    </div>
        <input type="submit" value="Valider"/>
    </div>
</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>