<?php $title = 'Blog pour un écrivain'; ?>

<?php ob_start(); ?>
<h1 id="admin">Billet simple pour l'Alaska</h1>
<p class="textacceuil1">Derniers billets du blog :</p>

<?php
if (isset($_SESSION['pseudo']))
{
    $bonjour = 'Bonjour ' . $_SESSION['pseudo'];
?>

    <p class="textacceuil2"><?= $bonjour ?></p>
<?php
}
else{
?>
<p class="textacceuil2">personne n'est connecté</p>
<?php
}
if(!$_SESSION || $_SESSION['droit']==0)
{
    throw new Exception('vous navez pas les droits admin');
    
}
else
    {
        while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3 class="titrepost">
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <div class="newstext">
            <?= /*nl2br(htmlspecialchars(*/$data['content'] ?>
            <br />
                <em><a href="index.php?action=postAdmin&amp;id=<?= $data['id'] ?>#commentaires" class="crud">Commentaires</a></em>
                <em><a href="index.php?action=updateBillet&amp;id=<?= $data['id'] ?>#majbillet" class="crud">update</a></em>
                <em><a href="index.php?action=deleteBillet&amp;id=<?= $data['id'] ?>" class="crud">supprimer</a></em>
        </div>
    </div>
<?php
}
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
