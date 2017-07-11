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

	//verification donnée du jour en bdd
	public function dailyDataInBdd($date, $user_id)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT id FROM daily_data 
							WHERE daily_date = :daily_date AND user_id = :user_id");
		$q->execute(array(
						'daily_date' => $date,
						'user_id' => $user_id));

		$count = $q->rowCount();
		
		$q->closeCursor();

		return $count;
	}

	//Trouve donné du jour avec user_id et date du jour
	public function findDailyDataId($date, $user_id)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT * FROM daily_data 
							WHERE daily_date = :daily_date 
							AND user_id = :user_id");
		$q->execute(array(
						'daily_date' => $date,
						'user_id' => $user_id
			));

		$data = $q->fetch(PDO::FETCH_OBJ);

		$q->closeCursor();

		return $data;
	}

	//Creation donnée du jour
	public function createDailyData($data)
	{
		global $bdd;

		$q = $bdd->prepare("INSERT INTO daily_data(user_id, physical_form, physical_form_desc, psycho_form, psycho_form_desc, pain, pain_desc, daily_date, other_city, temperature, weather)
							VALUES(:user_id, :physical_form, :physical_form_desc, :psycho_form, :psycho_form_desc, :pain, :pain_desc, :daily_date, :other_city, :temperature, :weather)");
		$q->execute(array(
					'user_id' => $data->getUser_id(),
					'other_city' => $data->getOther_city(),
					'physical_form' => $data->getPhysical_form(),
					'physical_form_desc' => $data->getPhysical_form_desc(),
					'psycho_form' => $data->getPsycho_form(),
					'psycho_form_desc' => $data->getPsycho_form_desc(),
					'pain' => $data->getPain(),
					'pain_desc' => $data->getPain_desc(),
					'daily_date' => $data->getDaily_date(),
					'temperature' => $data->getTemperature(),
					'weather' => $data->getWeather()
		));
	}

	//Add donné du jour 2e formulaire
	public function updateDailyData($data)
	{
		global $bdd;

		$q = $bdd->prepare("UPDATE daily_data
							SET symptom = :symptom,
								symptom_desc = :symptom_desc,
								lunch = :lunch,
								other = :other
							WHERE id = :id");
		$q->execute(array(
					'id' => $data->getId(),
					'symptom' => $data->getSymptom(),
					'symptom_desc' => $data->getSymptom_desc(),
					'lunch' => $data->getLunch(),
					'other' => $data->getOther()
		));
	}	


	//trouve un utilisateur par pseudo
	public function findPseudo($pseudo)
	{
		global $bdd;

		$q = $bdd->prepare('SELECT email, password FROM users WHERE pseudo = ?');
		$q->execute(array($pseudo));

		$data = $q->fetch(PDO::FETCH_OBJ);

		return $data;
	}

	//trouve un utilisateur actif par pseudo ou email
	public function activeUser($pseudo)
	{
		global $bdd;

		$q = $bdd->prepare("UPDATE users SET active = '1', token = '' WHERE pseudo = ?");
		$q->execute(array($pseudo));
	}

	//ajout du token user
	public function addToken($token, $id)
	{
		global $bdd;

		$q = $bdd->prepare('UPDATE users SET token = :token WHERE id = :id');
		$q->execute(array(
				'token' => $token,
				'id' => $id
		));
	}

	//edit mot de passe user
	public function editPassword($password, $pseudo)
	{
		global $bdd;

		$q = $bdd->prepare("UPDATE users 
							SET password = :password, token = :token 
							WHERE pseudo = :pseudo");

		$q->execute(array(
				'password' => $password,
				'token' => "",
				'pseudo' => $pseudo
		));
	}		

	//Update profil utilisateur
	public function updateUser($user)
	{
		global $bdd;

		$q = $bdd->prepare("UPDATE users
							SET name = :name,
								nickname = :nickname,
								city = :city,
								sexe = :sexe,
								birthday = :birthday,
								maladie = :maladie,
								traitement = :traitement
							WHERE id = :id");
		$q->execute(array(
					'id' => $user->getId(),
					'name' => $user->getName(),
					'nickname' => $user->getNickname(),
					'city' => $user->getCity(),
					'sexe' => $user->getSexe(),
					'birthday' => $user->getBirthday(),
					'maladie' => $user->getMaladie(),
					'traitement' => $user->getTraitement()
		));
	}

	//Creation utilisateur
	public function createUser($user)
	{
		global $bdd;

		$q = $bdd->prepare("INSERT INTO users(pseudo, email, password, role, token)
							VALUES(:pseudo, :email, :password, :role, :token)");
		$q->execute(array(
					'pseudo' => $user->getPseudo(),
					'email' => $user->getEmail(),
					'password' => $user->getPassword(),
					'role' => $user->getRole(),
					'token' => $user->getToken()
		));
	}


	//trouve tous les utilisateurs
	public function findAllUsers()
	{
		global $bdd;

		$q = $bdd->query("SELECT * FROM users");

		$data = $q->fetchAll(PDO::FETCH_OBJ);

		$q->closeCursor();

		return $data;
	}

	//Trouve le jour d anniversair epour un id
	public function findBirthdayDayByUserId($id)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT  date_format(birthday, '%d') as dateDay
							FROM users 
							WHERE id = :id
							");
		$q->execute(array(
			'id' => $id
			));

		$data = $q->fetch(PDO::FETCH_OBJ);

		return $data;
	}	

	//Trouve le mois d anniversair epour un id
	public function findBirthdayMonthByUserId($id)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT  date_format(birthday, '%m') as dateMonth
							FROM users 
							WHERE id = :id
							");
		$q->execute(array(
			'id' => $id
			));

		$data = $q->fetch(PDO::FETCH_OBJ);

		return $data;
	}

	//Trouve l année d anniversair epour un id
	public function findBirthdayYearByUserId($id)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT  date_format(birthday, '%Y') as dateYear
							FROM users 
							WHERE id = :id
							");
		$q->execute(array(
			'id' => $id
			));

		$data = $q->fetch(PDO::FETCH_OBJ);

		return $data;
	}		

	//Trouve un role par id
	public function findRoleById($id)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT role FROM users WHERE id = ?");
		$q->execute(array($id));

		$data = $q->fetch(PDO::FETCH_OBJ);

		$q->closeCursor();

		return $data;
	}	

	//Update profil actif utilisateur
	public function updateActiveUser($user)
	{
		global $bdd;

		$q = $bdd->prepare("UPDATE users
							SET active = :active
							WHERE id = :id");
		$q->execute(array(
					'id' => $user->getId(),
					'active' => $user->getActive()
		));
	}

}