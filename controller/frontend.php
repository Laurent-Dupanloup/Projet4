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

function post($id)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postid, $comment, $author_id)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postid, $comment, $author_id);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postid);
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

function verifMember($pseudo, $mdp)
{  
    $userConnexion = new MemberManager();
    $resultat = $userConnexion->checkLoginPass($pseudo);
    $resultatMembre =$resultat->fetch();
//try{

    if (!$resultatMembre)
    {
         //echo 'Mauvais identifiant ou mot de passe 66!';//n'existe pas faire une exeption
        throw new Exception("Mauvais identifiant ou mot de passe 66 !");
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
            //$resultat->closeCursor();
            if($_SESSION['droit'] != 1){
                header('Location: index.php');
            }
            elseif($_SESSION['droit'] == 1)
            {
                header('Location: index.php?action=modeAdmin');
            }
        }
        else
        {
            //echo 'Mauvais identifiant ou mot de passe 77!'; // exeption
            throw new Exception("Mauvais identifiant ou mot de passe 77 !");
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
    header('Location: index.php');
}

function deleteCom($id, $postid)
{
    $commentManager = new CommentManager();

    $delete = $commentManager->comDelete($id, $postid);
    header('Location: index.php?action=postAdmin&id='. $postid);
}

function createBillet($title, $mytextarea)
{
    $postManager = new PostManager();
    $newPost = $postManager->addPost($title, $mytextarea);
    header('Location: index.php?action=modeAdmin');
}

function createBilletForm()
{
    require('view/frontend/newPostView.php');
}

function deleteBillet($id)
{
   $postManager = new PostManager();
    $unPost = $postManager->deletePost($id);
    header('Location: index.php');
}

function updateBillet($id)
{
    $postManager = new PostManager();
    $unPost2 = $postManager->getBilletEdit($id);
    require('view/frontend/updateBilletView.php');
    
}

function modeAdmin(){
    $postManager = new PostManager(); 
    $posts = $postManager->getPosts();
    require('view/frontend/adminListPostsView.php');

}

function postAdmin($id)
{
    $postManager2 = new PostManager();
    $commentManager2 = new CommentManager();

    $post = $postManager2->getPost($_GET['id']);
    $comments = $commentManager2->getComments($_GET['id']);

    require('view/frontend/adminPostView.php');
}

function signalementMsg($id)
{
    $commentManager3 = new CommentManager();
    $signalementCom = $commentManager3->reportMsg($id);
    if($signalementCom == true){
     header('Location: index.php');
    }
    else
        throw new Exception('probleme lors du signalement');
        
}

function updateBilletComfirm($id, $title, $content)
{
    $postManager3 = new PostManager();
    $insertNewPost = $postManager3->majDuPost($id, $title, $content);
    header('Location: index.php?action=modeAdmin');
}

function listMsgSignal()
{
    $commentManager4 = new CommentManager();
    
    $commentReportList = $commentManager4->reportMsgList();

    require('view/frontend/adminListReportMsgView.php');
}

function signalementCancel($id)
{
    $commentManager5 = new CommentManager();
    $reportcancel = $commentManager5->cancelReport($id);
    header('Location: index.php?action=listMsgSignal');
}