<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
    	<nav>
    <ul>
        <li><a href="index.php?action=listPosts">liste des billets</a></li>
        <?php 
        	if(!$_SESSION){
        ?>
        <li><a href="index.php?action=addMember">inscription</a></li>
        <li><a href="index.php?action=verifMember">connexion</a></li>
    	<?php
    		} 
        	if($_SESSION){
        		var_dump($_SESSION);
        ?>
        <li><a href="index.php?action=decoMember">deconnexion</a></li><!--faire des test pour inscription connexion-->
    	<?php 
    		if($_SESSION['droit']==1){
    		?>
    			<li><a href="index.php?action=modeAdmin">admin</a></li>
    		<?php
    		}
    	}
    	?>
    </ul>
</nav>
        <?= $content ?>
    </body>
</html>
