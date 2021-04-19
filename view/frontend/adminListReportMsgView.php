

<?php ob_start(); ?>
<h1>Billet simple pour l'Alaska</h1>


<h2>Commentaires</h2>
<?php
while ($comment = $commentReportList->fetch())
{
        ?>
    <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
         <em><a href="index.php?action=deleteCom&amp;id=<?= $comment['ID'] ?>&amp;postid=<?= $comment['post_id'] ?>">Supprimer le commentaire</a></em>
         <em><a href="index.php?action=signalementCancel&amp;id=<?= $comment['ID'] ?>">annuler le signalement</a></em>
         <?php
     }
?>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>