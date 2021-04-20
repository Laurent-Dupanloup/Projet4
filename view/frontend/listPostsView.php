<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>
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
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <div class="newstext">
            <?= /*nl2br(htmlspecialchars*/($data['content']) ?>
            <br />
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em> 
        </div>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
