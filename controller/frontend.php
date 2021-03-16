<?php
//rajouter des test
// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MemberManager.php');

function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function addMember($pseudo, $mdp, $droit)
{
    $pass_hache = password_hash($mdp, PASSWORD_DEFAULT);
    $memberManager = new MemberManager();
    $pseudoDispo = $memberManager->dispoPseudo($pseudo);
    if(!$pseudoDispo)
    {
        $memberAdded = $memberManager->addNewMember($pseudo, $pass_hache, $droit);
    }
    else
        echo 'le pseudo est déjà pris ';
    require('view/frontend/inscriptionView.php');
}

function formAddMember()
{
    require('view/frontend/inscriptionView.php');
}

function verifMember($pseudo, $mdp)//ajouter les droits
{  
    $userConnexion = new MemberManager();
    $resultat = $userConnexion->checkLoginPass($pseudo);
    $testt =$resultat->fetch();

    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = password_verify($mdp, $testt['mdp']);
    echo var_dump($testt['mdp']);
    echo '</br>';
    echo var_dump($mdp);
    echo '</br>';
    echo 'on est ds verifMember';
    echo '</br>';
    echo var_dump($isPasswordCorrect);
   /* echo (gettype($isPasswordCorrect));
    echo '</br>';*/
    if (!$testt)
    {
         echo 'Mauvais identifiant ou mot de passe 66!';
    }
    else
    {
        if($isPasswordCorrect==true){
            session_start();
            $_SESSION['id'] = $testt['id'];
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['droit'] = $testt['droit'];
            echo 'Vous êtes connecté !';//droit en variable de session
        }
        else
        {
            echo 'Mauvais identifiant ou mot de passe 77!';
        }
    }
    require('view/frontend/connexionView.php');
}

function formConnexion()
{
    require('view/frontend/connexionView.php');
}

