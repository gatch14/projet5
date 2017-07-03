<?php

include('model/auth.php');
require('model/functions.php');
require('model/constants.php');
use Acme\Domain\User;
use Acme\DAO\UserDAO;
use Acme\DAO\DailyDataDAO;


if ($_SESSION['user_id'] == $_GET['id']) 
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
