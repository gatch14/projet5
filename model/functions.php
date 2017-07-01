<?php
use Acme\Domain\User;
use Acme\Domain\Medic;
//funciton echap pour htmlspecialchars
if (!function_exists('echap')) 
{
	function echap($string)
	{
		if ($string) 
		{
			return htmlspecialchars($string);
		}
	}
}


//verification bdd si pseudo et email sont deja present
if (!function_exists('is_in_bdd')) 
{
	function is_in_bdd($field, $value, $table)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT id FROM $table WHERE $field = ?");
		$q->execute(array($value));

		$count = $q->rowCount();
		
		$q->closeCursor();

		return $count;
	}
}



//garde des messages en session
if (!function_exists('message_flash')) 
{
	function message_flash($message, $type = 'info')
	{
		$_SESSION['notification']['message'] = $message;
		$_SESSION['notification']['type'] = $type;
	}
}


//sauvegarde des infos dans le formulaire pour eviter de reecrire sauf password
if (!function_exists('save_data')) 
{
	function save_data()
	{
		foreach ($_POST as $key => $value) 
		{
			if(strpos($key, 'password') === false)
			{
				$_SESSION['input'][$key] = $value;
			}
			
		}
	}
}

//retourne les infos sauvegarder de save_data()
if (!function_exists('input_data')) 
{
	function input_data($key)
	{
		if (!empty($_SESSION['input'][$key])) 
		{
			return echap($_SESSION['input'][$key]);	
		} else
		{
			return null;
		}
	}		
}

//supprimes les infos stocké via save_data() si on retourne sur la page
if (!function_exists('clear_input_data')) 
{
	function clear_input_data()
	{
		if (isset($_SESSION['input'])) 
		{
			$_SESSION['input'] = [];	
		}
	}		
}

//etat active des liens nav
if (!function_exists('class_active')) 
{
	function class_active($file)
	{
		$page = $_GET['page'];

		if ( $file == $page) 
		{
			return "active";
		} else
		{
			return "";
		}
	}
}

//Trouve un utilisateur par id et on cherche ses infos dans la bdd sous forme d objet
if (!function_exists('find_user_id')) 
{
	function find_user_id($id)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT * FROM users WHERE id = ?");
		$q->execute(array($id));

		$data = $q->fetch(PDO::FETCH_OBJ);

		$q->closeCursor();

		return $data;
	}		
}

//Vérification utilisateur connecté
if (!function_exists('logged')) 
{
	function logged()
	{
		return isset($_SESSION['user_id']) || isset($_SESSION['pseudo']);
	}		
}
/*
//trouve un utilisateur par pseudo ou email
if (!function_exists('find')) 
{
	function find($identifiant)
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
}*/

//ajout du token user
if (!function_exists('addToken')) 
{
	function addToken($token, $id)
	{
		global $bdd;

		$q = $bdd->prepare('UPDATE users SET token = :token WHERE id = :id');
		$q->execute(array(
				'token' => $token,
				'id' => $id
		));
	}		
}

//edit mot de passe user
if (!function_exists('editPassword')) 
{
	function editPassword($password, $pseudo)
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
}


//Creation utilisateur
if (!function_exists('createUser')) 
{
	function createUser($user)
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
}
/*
//trouve un utilisateur par pseudo ou email
if (!function_exists('findPseudo')) 
{
	function findPseudo($pseudo)
	{
		global $bdd;

		$q = $bdd->prepare('SELECT email, password FROM users WHERE pseudo = ?');
		$q->execute(array($pseudo));

		$data = $q->fetch(PDO::FETCH_OBJ);

		return $data;
	}		
}*/
/*
//trouve un utilisateur actif par pseudo ou email
if (!function_exists('activeUser')) 
{
	function activeUser($pseudo)
	{
		global $bdd;

		$q = $bdd->prepare("UPDATE users SET active = '1', token = '' WHERE pseudo = ?");
		$q->execute(array($pseudo));
	}		
}*/

//Update profil utilisateur
if (!function_exists('updateUser')) 
{
	function updateUser($user)
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
}

//Update profil Medic
if (!function_exists('updateMedic')) 
{
	function updateMedic($medic)
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
}


/*
//Creation donnée du jour
if (!function_exists('createDailyData')) 
{
	function createDailyData($data)
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
}
*/
/*
//verification donnée du jour en bdd
if (!function_exists('daily_data_in_bdd')) 
{
	function daily_data_in_bdd($date, $user_id)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT $user_id FROM daily_data WHERE daily_date = ?");
		$q->execute(array($date));

		$count = $q->rowCount();
		
		$q->closeCursor();

		return $count;
	}
}

//Trouve donné du jour avec user_id et date du jour
if (!function_exists('find_daily_data_id')) 
{
	function find_daily_data_id($date, $user_id)
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
}*/
/*
//Add donné du jour 2e formulaire
if (!function_exists('updateDailyData')) 
{
	function updateDailyData($data)
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
}
*/