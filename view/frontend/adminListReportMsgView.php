<?php $title = 'Blog pour un écrivain'; ?>
<?php ob_start(); ?>
<h1 id="messagessignal">Billet simple pour l'Alaska</h1>

<div class="blog">
<h2>Commentaires</h2>
<?php
while ($comment = $commentReportList->fetch())
{
        ?>
    <p><strong><?= htmlspecialchars($comment['pseudo']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
         <em><a href="index.php?action=deleteCom&amp;id=<?= $comment['ID'] ?>&amp;postid=<?= $comment['post_id'] ?>" class="crud">Supprimer le commentaire</a></em><br/>
         <em><a href="index.php?action=signalementCancel&amp;id=<?= $comment['ID'] ?>" class="crud">annuler le signalement</a></em>
         <?php
     }
?>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>