<?php

include('model/auth.php');
require('model/functions.php');
require('model/constants.php');
use Acme\Domain\User;
use Acme\DAO\UserDAO;

$adminDAO = new UserDAO;
$user= $adminDAO->findRoleById($_SESSION['user_id']);

//controle session + session user = roleAdmin
if (!empty($_SESSION['user_id']) AND ($user->role = "roleAdmin")) 
{
	$userDAO = new UserDAO;
	$adminUserUpdate = $userDAO->findUserId($_GET['id']);

} else
{
		header('Location: index.php');
		exit();	
}


if (isset($_POST['admin-update-user']))
{
	extract($_POST);

	$updateUser = new User();
	$updateUser->setId($_GET['id']);
	$updateUser->setActive($active);
	$userDAO->updateActiveUser($updateUser);

	message_flash("Le profil a été mis à jour", 'success');
	header('Location: '.SITE_URL.'home&id='.$_SESSION['user_id']);
	exit();
}
 
//On inclut la vue
include('views/admin-update-account.view.php');
