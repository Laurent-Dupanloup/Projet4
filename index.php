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
                post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty(/*$_POST['author']*/$_SESSION['pseudo']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], /*$_POST['author']*/
                        $_SESSION['pseudo'], $_POST['comment']);
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
            if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])&&!empty($_POST['droit'])){
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
        /*elseif ($_GET['error'] == 'mauvais_identifiant_mdp'){
                //throw new Exception("mauvais identifiant mdp");
            listPosts();
                
        }*/
        elseif ($_GET['action'] == 'deleteCom')
        {
            if(isset($_GET['id']) && $_GET['id'] > 0)
            {
                deleteCom($_GET['id']);
            }
            else
            {
                throw new Exception('probleme lors du delete');
            }       

        }
    }
    else {
            listPosts();
        }
}
catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}
