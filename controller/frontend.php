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

/*function listPosts2($pseudo)
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    //$_SESSION['pseudo'] = $pseudo;

    require('view/frontend/listPostsView.php');
}*/


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
    $resultatMembre =$resultat->fetch();

    // Comparaison du pass envoyé via le formulaire avec la base
    //$isPasswordCorrect = password_verify($mdp, $resultatMembre['mdp']);
    /*echo var_dump($resultatMembre['mdp']);
    echo '</br>';
    echo var_dump($mdp);
    echo '</br>';
    echo 'on est ds verifMember';
    echo '</br>';
    echo var_dump($isPasswordCorrect);*/
   /* echo (gettype($isPasswordCorrect));
    echo '</br>';*/
//try{

    if (!$resultatMembre)
    {
         //echo 'Mauvais identifiant ou mot de passe 66!';//n'existe pas faire une exeption
        throw new Exception("Mauvais identifiant ou mot de passe 66!");
        //die('Mauvais identifiant ou mot de passe 66!');
        
    }
    else
    {
        //if($isPasswordCorrect==true){
        if(password_verify($mdp, $resultatMembre['mdp'])===true){
            $_SESSION['id'] = $resultatMembre['id'];
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['droit'] = $resultatMembre['droit'];
            //droit en variable de session on peut rediriger vers la page d'acceuil
            //echo var_dump($_SESSION);
            header('Location: index.php');
        }
        else
        {
            //echo 'Mauvais identifiant ou mot de passe 77!'; // exeption
            throw new Exception("Mauvais identifiant ou mot de passe 77!");
             //die('Mauvais identifiant ou mot de passe 77!');
            
        }
    }
    /*catch(exeption $e)
    {
        //echo 'Erreur : ' . $e->getMessage();
        header('Location: index.php?error=mauvais_identifiant_mdp');
    }*/
    //require('view/frontend/connexionView');
}

function formConnexion()
{
    require('view/frontend/connexionView.php');
}

function decoMember()
{
    // Suppression des variables de session et de la session
    $_SESSION = array();
    session_destroy();

    // Suppression des cookies de connexion automatique
   // setcookie('pseudo', '');
   // setcookie('mdp', '');
    //echo 'vous etes deconnectes';
    //require('view/frontend/deconnexionView.php');
    header('Location: index.php');
}

function deleteCom($id)
{
    $commentManager = new CommentManager();

    $delete = $commentManager->comDelete($id);
    header('Location: index.php');
}