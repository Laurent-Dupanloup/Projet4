<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" /> 
         <script src="https://cdn.tiny.cloud/1/3vf77h5533axpf5nejitpmjqtpqoa59l3ksy0e06gn2nm8hn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
         <!--<script>
      tinymce.init({
        selector: '#content'
      });
    </script>-->
     <script>
    tinymce.init({
      selector: '#mytextarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
	</script>

    </head>
        
    <body>
    	<header>
    	<nav>
    <ul>
        <?php 
        	if(!$_SESSION){
        ?>
        <li><a href="index.php?action=listPosts">liste des billets</a></li>
        <li><a href="index.php?action=addMember">inscription</a></li>
        <li><a href="index.php?action=verifMember">connexion</a></li>
    	<?php
    		} 

    		elseif($_SESSION){
    			if($_SESSION['droit'] == 0){
    				?>
        <li><a href="index.php?action=listPosts">liste des billets</a></li>
        <li><a href="index.php?action=decoMember">deconnexion</a></li><!--faire des test pour inscription connexion-->
    	<?php 
    			}
    			elseif($_SESSION['droit']==1){
    				?>
    			<li><a href="index.php?action=modeAdmin">admin</a></li>
    			<li><a href="index.php?action=createBillet">Creer un billet</a></li>
    			<li><a href="index.php?action=listMsgSignal">messages signalés</a></li>
    			<li><a href="index.php?action=decoMember">deconnexion</a></li>
    		<?php
    			}
    		}
    		?>
    </ul>
</nav>
</header>
        <?= $content ?>
    </body>
</html>
