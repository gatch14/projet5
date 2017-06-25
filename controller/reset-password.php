<?php

require('model/functions.php');
require('model/constants.php');

if($_GET['pseudo'] && $_GET['token'])
{
	$pseudo = $_GET['pseudo'];
	$token = $_GET['token'];

	if(is_in_bdd('pseudo', $pseudo, 'users') &&
	   is_in_bdd('token', $token, 'users'))
	{

		//Reinit mdp
		if(isset($_POST['new-password']))
		{
			if( !empty($_POST['password']) && 
				!empty($_POST['password_confirm']) )
			{
				extract($_POST);

				$errors = [];

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

				if (count($errors) == 0) 
				{
					$password = password_hash($password, PASSWORD_BCRYPT);

					$editPass = editPassword($password, $pseudo);

					message_flash("Modification ok!", 'success');

					header('Location: '.SITE_URL.'login');
					exit();
				}

			} else
			{
				$errors[] = "Veuillez remplir tous les champs, merci";
				save_data();
			}
		}

		require('views/reset-password.view.php');
	}
} else
{
	message_flash("Un problème est survenu", 'danger');
	header('Location: index.php');
	exit();
}