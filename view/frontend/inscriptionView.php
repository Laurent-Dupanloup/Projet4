<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1 class="mesh1">Billet simple pour l'Alaska</h1>
<h3 class="mesh3">Inscription</h3>
<div class="divform">
<form action="index.php?action=addMember" method="post">
    <div>
        <label for="pseudo">pseudo</label><br />
        <input type="text" id="pseudo" name="pseudo" required/>
    </div>
    <div>
        <label for="mdp">mot de passe</label><br />
        <input type="text" id="mdp" name="mdp" required/>
    </div>
    <div>
        <label for="droit">droit</label><br />
        <input type="number" id="droit" name="droit" min="0" max="1" required/>
    <div>
    <div>
        <input type="submit" value="Valider"/>
    </div>
</form>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>