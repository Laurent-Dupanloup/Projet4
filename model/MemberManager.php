<?php
require_once("model/Manager.php");

class MemberManager extends Manager
{
	 public function addNewMember($pseudo, $mdp)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO membre(pseudo, mdp) VALUES(?, ?)');
       	$memberAdded = $req->execute(array($pseudo, $mdp));

        return $memberAdded;
    }
}
