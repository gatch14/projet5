<?php

namespace Acme\DAO;
use PDO;
class RelationDAO 
{

	//verification bdd relation déja présente
	public function relationInBdd($idUser, $idMedic)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT * FROM relation 
							WHERE (user_id = :user_id 
							AND medic_id = :medic_id)");
		$q->execute(array(
						'user_id' => $idUser,
						'medic_id' => $idMedic
		));

		$count = $q->rowCount();
		
		$q->closeCursor();

		return $count;
	}

	//Creation relation
	public function createRelation($user_id, $medic_id)
	{
		global $bdd;

		$q = $bdd->prepare("INSERT INTO relation(user_id, medic_id)
							VALUES(:user_id, :medic_id)");
		$q->execute(array(
					'user_id' => $user_id,
					'medic_id' => $medic_id
		));
	}	

	//Trouve un role par email
	public function findRoleByEmail($email)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT role FROM users WHERE email = ?");
		$q->execute(array($email));

		$data = $q->fetch(PDO::FETCH_OBJ);

		$q->closeCursor();

		return $data;
	}		

	//Trouve tous les medic pour un user
	public function findAllMedicByUserId($userId)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT *
							FROM relation 
							WHERE user_id = :user_id
							");
		$q->execute(array(
			'user_id' => $userId
			));

		$data = $q->fetchAll(PDO::FETCH_OBJ);

		return $data;
	}

		

	//Trouve tous les medic pour un user
	public function findAllUserByMedicId($medicId)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT *
							FROM relation 
							WHERE medic_id = :medic_id
							");
		$q->execute(array(
			'medic_id' => $medicId
			));

		$data = $q->fetchAll(PDO::FETCH_OBJ);

		return $data;
	}
	
}