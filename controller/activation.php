<?php

include('model/guest.php');
require('model/functions.php');
require('model/constants.php');

use Acme\DAO\UserDAO;


$userDAO = new UserDAO;

if (!empty($_GET['pseudo']) && 
	$userDAO->isInBdd('pseudo', $_GET['pseudo'], 'users') &&
	!empty($_GET['token'])) 
{

	$data = $userDAO->findPseudo($pseudo);

	$token_verif = sha1($pseudo.$data->email.$data->password);

	if ($token == $token_verif) 
	{
		$userDAO->activeUser($pseudo);
		message_flash("Merci, votre compte est maintenant activé, vous pouvez vous connecter!", 'success');

		header('Location: '.SITE_URL.'login');
		exit();
	} else
	{
		message_flash('Parametres invalides', 'danger');
		header('Location: index.php');
		exit();
	}
} else
{
	header('Location: index.php');
	exit();
}