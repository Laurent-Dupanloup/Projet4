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
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>
        
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
            <br />
            <?php
            if(!$_SESSION || $_SESSION['droit']==0){
                ?>
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em> 
                <?php
            }
            elseif($_SESSION['droit']==1){
                ?>
                <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em>
                <em><a href="index.php?action=editBillet&amp;id=<?= $data['id'] ?>">editer</a></em>
                <em><a href="index.php?action=deleteBillet&amp;id=<?= $data['id'] ?>">supprimer</a></em>
                <?php
            }
            ?>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
