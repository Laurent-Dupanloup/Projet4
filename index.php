<?php
session_start();
require('controller/frontend.php');

try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
                listPosts();
            }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (/*!empty(/*$_POST['author_id']/*$_SESSION['id']) && */!empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['comment'], $_SESSION['id']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addMember') {
            if(isset($_POST['pseudo']) && isset($_POST['mdp']) && isset($_POST['droit'])){
                 addMember($_POST['pseudo'], $_POST['mdp'], $_POST['droit']);

            }
            elseif (empty($_POST['pseudo']) && empty($_POST['mdp'])) {
                formAddMember();
            }
            else
            {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
           }
        elseif ($_GET['action'] == 'verifMember'){
            if (isset($_POST['pseudo']) && isset($_POST['mdp'])){
                verifMember($_POST['pseudo'], $_POST['mdp']);
            }

            elseif (empty($_POST['pseudo']) && empty($_POST['mdp'])) {
                formConnexion();
            }
            else
            {
                throw new Exception('Mauvais identifiant ou mot de passe99');
                
            }
            }
        elseif ($_GET['action'] == 'decoMember') {
                decoMember();
            }
        elseif ($_GET['action'] == 'deleteCom')
        {
            if(isset($_GET['id']) && $_GET['id'] > 0)
            {
                deleteCom($_GET['id'], $_GET['postid']);
            }
            else
            {
                throw new Exception('probleme lors du delete');
            }       

        }
        elseif($_GET['action'] == 'createBillet')
        {
            if(isset($_POST['title']) && isset($_POST['mytextarea']) && ($_SESSION['droit'] == 1)){
                createBillet($_POST['title'], /*strip_tags (*/$_POST['mytextarea']/*)htmlspecialchars_decode($_POST['mytextarea'])*/);
            }

            elseif(!isset($_POST['title']) && !isset($_POST['mytextarea']))
            {
                createBilletForm();
            }
            else
            {
                //echo $_POST['mytextarea'];
                throw new Exception('erreur lors de la creation du billet-ou vous navez pas les droits');
            }
                
        }
        elseif($_GET['action'] == 'deleteBillet')
        {
            if(isset($_GET['id']) && $_GET['id'] > 0){
                deleteBillet($_GET['id']);
            }
            else {
                throw new Exception('erreur lors de la suppresion du billet');
                
            }
        }
        elseif ($_GET['action']== 'updateBillet') {
            if(isset($_GET['id']) && $_GET['id'] > 0){
                updateBillet($_GET['id']);
            }
            else
            {
                throw new Exception('erreur lors du chargement du billet');
                
            }
        }
        elseif($_GET['action'] == 'updateBilletComfirm'){
            if(isset($_POST['mytextarea']) && isset($_POST['title']) && isset($_GET['id']))
            {
                echo $_POST['mytextarea'];
                updateBilletComfirm($_GET['id'], $_POST['title'], $_POST['mytextarea']);
            }
            else
                throw new Exception('erreur lors de linsert de lupdate de sur la bdd');
                
        }
        elseif($_GET['action']== 'modeAdmin'){
            if($_SESSION['droit']==1){
                modeAdmin();
            }
            else
                throw new Exception('problem avec le mode admin');
                
        }
        elseif ($_GET['action'] == 'postAdmin') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                postAdmin($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action']== 'signalementMsg'){
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                signalementMsg($_GET['id']);
            }
            else
                throw new Exception('problem avec le signalement - ou alors vous navez pas les droits requis');
                
        }
        elseif($_GET['action'] == 'listMsgSignal')
        {
            listMsgSignal();
        }
        /*else
            throw new Exception('vous netes pas admin');*/
        
        elseif ($_GET['action'] == 'signalementCancel') {
                signalementCancel($_GET['id']);
            }    
    }

    else {
            listPosts();
        }
    }

catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
//booleen pour le signalement et ds la table comments remplacer author par authorID