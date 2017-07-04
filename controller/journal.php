<?php

include('model/auth.php');
require('model/functions.php');
require('model/constants.php');
use Acme\Domain\User;
use Acme\DAO\UserDAO;
use Acme\DAO\MedicDAO;

$MedicDAO = new MedicDAO;
$medicRole = $MedicDAO->findRoleById($_SESSION['user_id']);

if ( ($_SESSION['user_id'] == $_GET['id']) 
	OR ($medicRole->role == "roleMedic")) 
{
	$userDAO = new UserDAO;
	$user = $userDAO->findUserId($_SESSION['user_id']);

} else
{
		header('Location: index.php');
		exit();	
}
 
//On inclut la vue
include('views/journal.view.php');
