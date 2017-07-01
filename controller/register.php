<?php

include('model/guest.php');
require('model/functions.php');
require('model/constants.php');
use Acme\Domain\User;
use Acme\DAO\UserDAO;
use Acme\Domain\Medic;
use Acme\DAO\MedicDAO;


	// Si le formulaire a  été envoyé
	if (isset($_POST['register'])) 
	{
		//controle que les champs ne sont pas vide
		if (!empty($_POST['pseudo']) && 
			!empty($_POST['email']) &&
			!empty($_POST['password']) && 
			!empty($_POST['password_confirm'])) 
		{
			extract($_POST);
			$errors = [];
			$userDAO = new UserDAO;

			//controle pseudo mini 3 caractères
			if(mb_strlen($pseudo) < 3)
			{
				$errors[] = "Il faut 3 caractères minimum pour le pseudo";
			}

			//controle adresse email valide
			if (! filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
				$errors[] = "Adresse email non valide";
			}

			//controle password mini 6
			if(mb_strlen($password) < 6)
			{
				$errors[] = "Mot de passe de 6 caractères mini";
			} else
			{
				//controle 2 password identique
				if ($password != $password_confirm) 
				{
					$errors[] = "Mot de passe pas identique";
				}
			}

			//controle pseudo deja utilisé
			if($userDAO->isInBdd('pseudo', $pseudo, 'users'))
			{
				$errors[] = "Pseudo déja utilisé";
			}

			//controle email deja utilisé
			if(($userDAO->isInBdd('email', $email, 'users') 
							AND $role != "roleMedic"))
			{
				$errors[] = "Email déja utilisé";
			}

			if (count($errors) == 0) 
			{
				//$options = array('cost' => 9);
				$password = password_hash($password, PASSWORD_BCRYPT);

				$token = sha1($pseudo.$email.$password);

				if ($role == "roleMedic") {
					$medic = new Medic;
					$medicDAO = new MedicDAO;
					$activeMedic = $medicDAO->findMedicByEmail($email);
					if ($activeMedic->active == 1) 
					{
						message_flash("Votre compte est déja activé", 'warning');

						header('Location: index.php');
						exit();
					} else 
					{

						$medic->setPseudo($pseudo);
						$medic->setEmail($email);
						$medic->setPassword($password);
						$medic->setToken($token);

						$medicDAO->updateMedicIfInBdd($medic);

					}
				} else
				{					
					$user = new User();
					$user->setPseudo($pseudo);
					$user->setEmail($email);
					$user->setPassword($password);
					$user->setRole($role);
					$user->setToken($token);

					$userDAO->createUser($user);
				}

				//envoi du mail d activivation
				/*$to = $email;
				$subject = 'Activation de votre comte';

				ob_start();
				require('templates/emails/activation.view.php');
				$content = ob_get_clean();

				$headers = 'MIME-Version: 1.0' . "\r\n";
				$headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

				mail($to, $subject, $content, $headers);*/

				message_flash("Mail d'activation envoyé!", 'success');

				header('Location: index.php');
				exit();
			} else
			{
				save_data();
			}

		} else 
		{
			$errors[] = "Veuillez remplir tous les champs, merci";
			save_data();
		}	

	} else
	{
		clear_input_data();
	}


require('views/register.view.php');

