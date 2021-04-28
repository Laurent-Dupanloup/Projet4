<?php
require_once("model/Manager.php");

class MemberManager extends Manager
{
	 public function addNewMember($pseudo, $mdp, $droit)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO membre(pseudo, mdp, droit) VALUES(?, ?, ?)');
       	$memberAdded = $req->execute(array($pseudo, $mdp, $droit));

        return $memberAdded;
    }

    public function checkLoginPass($pseudo)
    {
		$db = $this->dbConnect();
		$req = $db->prepare('SELECT id, mdp, droit FROM membre WHERE pseudo = :pseudo');
    	$req->execute(array(
        	'pseudo' => $pseudo));

    	return $req;
    }

    public function dispoPseudo($pseudo)
    {
    	$db = $this->dbConnect();
    	$req = $db->prepare('SELECT pseudo FROM membre WHERE pseudo = :pseudo');
    	$req->execute(array(
        	'pseudo' => $pseudo));
    	$pseudoDispo = $req->fetch();
    	
    	return $pseudoDispo;
    }
    /*armoniser le code*/
}
