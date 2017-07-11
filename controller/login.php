<?php

include('model/guest.php');
require('model/functions.php');
require('model/constants.php');

use Acme\Domain\User;
use Acme\DAO\UserDAO;


	// Si le formulaire a  été envoyé
if (isset($_POST['login'])) 
{
		//controle que les champs ne sont pas vide
	if (!empty($_POST['identifiant']) && 
		!empty($_POST['password'])) 
	{
		extract($_POST);

		$userDAO = new UserDAO;
		$user = $userDAO->find($identifiant);

		if($user && password_verify($password, $user->password))
		{
				//Récuperation id, pseudo quand on se connecte
			$_SESSION['user_id'] = $user->id;
			header('Location: '.SITE_URL.'home&id='.$user->id);
			exit();
		} else
		{
			message_flash("Pseudo, email ou mot de passe incorrecte!", 'danger');
			save_data();
		}
	}


} else
{
	clear_input_data();
}


include('views/login.view.php');