<?php $title = 'Blog pour un écrivain'; ?>

<?php ob_start(); ?>
<h1 class="mesh1">Billet simple pour l'Alaska</h1>
<h3 class="mesh3" id="connexion">Connexion</h3>
<div class="divform">
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
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>