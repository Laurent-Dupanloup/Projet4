<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="public/css/mediumscreen.css" rel="stylesheet" />
		<link href="public/css/smallscreen.css" rel="stylesheet" />
        <link href="public/css/style.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous"/>
         <script src="https://cdn.tiny.cloud/1/3vf77h5533axpf5nejitpmjqtpqoa59l3ksy0e06gn2nm8hn/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
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
        <li><a href="index.php?action=listPosts#listebillets">liste des billets</a></li>
        <li><a href="index.php?action=addMember#inscription">inscription</a></li>
        <li><a href="index.php?action=verifMember#connexion">connexion</a></li>
    	<?php
    		} 

    		elseif($_SESSION){
    			if($_SESSION['droit'] == 0){
    				?>
        <li><a href="index.php?action=listPosts#listebillets">liste des billets</a></li>
        <li><a href="index.php?action=decoMember">deconnexion</a></li>
    	<?php 
    			}
    			elseif($_SESSION['droit']==1){
    				?>
    			<li><a href="index.php?action=modeAdmin#admin">admin</a></li>
    			<li><a href="index.php?action=createBillet#creerbillet">Creer un billet</a></li>
    			<li><a href="index.php?action=listMsgSignal#messagessignal">messages signalés</a></li>
    			<li><a href="index.php?action=decoMember">deconnexion</a></li>
    		<?php
    			}
    		}
    		?>
    </ul>
</nav>
</header>
		<img class="img1" src="antique-book-bindings-books-1005324-2000x1200.jpg">
        <?= $content ?>
        <div class="divanim"><a href="index.php?#listebillets"><img class="imganim" src="bookanimation.jpg"></a></div>
    <footer>
 		<p>Copyright 2021 Laurent Dupanloup étudiant Openclassrooms. Ce Site est un projet étudiant <a href="https://openclassrooms.com/">OpenClassrooms</a></p>
	</footer>
    </body>
</html>
