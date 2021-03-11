<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<h3>Inscription</h3>
<form action="../../index.php?action=addMember" method="post">
    <div>
        <label for="pseudo">pseudo</label><br />
        <input type="text" id="pseudo" name="pseudo"/>
    </div>
    <div>
        <label for="mdp">mot de passe</label><br />
        <input type="text" id="mdp" name="mdp"/>
    </div>
    
    <div>
        <input type="submit" value="Valider"/>
    </div>
</form>
<p><a href="index.php">Retour à la liste des billets</a></p>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
<!--<div>
         <label for="mdp">retapper votre mot de passe</label><br />
         <textarea id="mdp" name="mdp"></textarea>
    </div>-->