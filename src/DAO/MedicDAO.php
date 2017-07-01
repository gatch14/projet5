<?php

namespace Acme\DAO;
use PDO;
class MedicDAO 
{

	//verification bdd si nom medecin deja present
	public function medicInBdd($email)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT email FROM users 
							WHERE (email = :email 
							AND role = :role)");
		$q->execute(array(
						'email' => $email->getEmail(),
						'role' => 'roleMedic'));

		$count = $q->rowCount();
		
		$q->closeCursor();

		return $count;
	}

	//Trouve un medecin par le nom et on cherche ses infos dans la bdd sous forme d objet
	public function findMedicByEmail($email)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT * FROM users WHERE email = ?");
		$q->execute(array($email));

		$data = $q->fetch(PDO::FETCH_OBJ);

		$q->closeCursor();

		return $data;
	}

	//Creation medecin 
	PUBLIC function createMedic($email)
	{
		global $bdd;

		$q = $bdd->prepare("INSERT INTO users( email, role)
							VALUES(:email, :role)");
		$q->execute(array(
					'email' => $email->getEmail(),
					'role' => 'roleMedic'
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

	//Update profil Medic
	public function updateMedic($medic)
	{
		global $bdd;

		$q = $bdd->prepare("UPDATE users
							SET name = :name,
								nickname = :nickname,
								city = :city,
								speciality = :speciality
							WHERE id = :id");
		$q->execute(array(
					'id' => $medic->getId(),
					'name' => $medic->getName(),
					'nickname' => $medic->getNickname(),
					'city' => $medic->getCity(),
					'speciality' => $medic->getSpeciality()
		));
	}

	//Update compte Medic si deja inscrit en bdd par user
	public function updateMedicIfInBdd($medic)
	{
		global $bdd;

		$q = $bdd->prepare("UPDATE users
							SET pseudo = :pseudo,
								password = :password,
								token = :token
							WHERE email = :email");
		$q->execute(array(
					'email' => $medic->getEmail(),
					'pseudo' => $medic->getPseudo(),
					'password' => $medic->getPassword(),
					'token' => $medic->getToken()
		));
	}
	
}