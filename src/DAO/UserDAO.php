<?php

namespace Acme\DAO;
use PDO;
class UserDAO 
{

	//trouve dans une table si un champ=>($field) à une valeur($value)
	public function isInBdd($field, $value, $table)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT id FROM $table WHERE $field = ?");
		$q->execute(array($value));

		$count = $q->rowCount();
		
		$q->closeCursor();

		return $count;
	}	

	//trouve un user par id
	public function findUserId($id)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT * FROM users WHERE id = ?");
		$q->execute(array($id));

		$data = $q->fetch(PDO::FETCH_OBJ);

		$q->closeCursor();

		return $data;
	}

	//trouve un utilisateur par pseudo ou email
	public function find($identifiant)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT * FROM users 
							WHERE (pseudo = :identifiant OR email = :identifiant)
							AND active ='1'");
		$q->execute(array(
			'identifiant' => $identifiant
			));

		$data = $q->fetch(PDO::FETCH_OBJ);

		return $data;
	}		
	
}