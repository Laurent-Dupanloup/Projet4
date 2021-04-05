<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>

<?php
if (isset($_SESSION['pseudo']))
{
    //echo 'Bonjour ' . $_SESSION['pseudo'];
    $bonjour = 'Bonjour ' . $_SESSION['pseudo'];
?>

    <p><?= $bonjour ?></p>
<?php
}
/*if(isset($pseudo)){
    echo 'Bonjour ' . $pseudo;
}*/
else{
//echo 'personne n\'est connecté';
?>
<p>personne n'est connecté</p>
<?php
}
//echo $_SESSION['pseudo'];
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
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= /*nl2br(htmlspecialchars(*/$data['content'] ?>
            <br />
                <em><a href="index.php?action=postAdmin&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
                <em><a href="index.php?action=updateBillet&amp;id=<?= $data['id'] ?>">update</a></em>
                <em><a href="index.php?action=deleteBillet&amp;id=<?= $data['id'] ?>">supprimer</a></em>
        </p>
    </div>
<?php
}
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
