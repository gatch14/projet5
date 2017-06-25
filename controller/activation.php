<?php

include('model/guest.php');
require('model/functions.php');
require('model/constants.php');


//
if (!empty($_GET['pseudo']) && 
	is_in_bdd('pseudo', $_GET['pseudo'], 'users') &&
	!empty($_GET['token'])) 
{
	$pseudo = $_GET['pseudo'];
	$token = $_GET['token'];

	$data = findPseudo($pseudo);

	$token_verif = sha1($pseudo.$data->email.$data->password);

	if ($token == $token_verif) 
	{
		activeUser($pseudo);
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