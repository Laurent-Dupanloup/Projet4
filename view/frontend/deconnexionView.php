<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<h3>deconnexion</h3>
<p> Vous etes deconnecté </p>
<p><a href="index.php?action=listPosts">Retour à la liste des billets</a></p><!-- ou alors renvoyer sur index-->
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>