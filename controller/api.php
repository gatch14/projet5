<?php

include('model/guest.php');
require('model/constants.php');


use Acme\Domain\User;
use Acme\DAO\UserDAO;
use Acme\DAO\DailyDataDAO;


if (!empty($_GET['id'])) 
{
	$userDAO = new UserDAO;
	$user = $userDAO->findUserId($_GET['id']);
	$idInBdd = $userDAO->isInBdd('id', $_GET['id'], 'users');
	
	if ( $idInBdd AND $user->role == 'roleUser' ) 
	{
		$userData = new DailyDataDAO;
		$dataJson = $userData->findAllDataByUserId($_GET['id']);
		echo(json_encode($dataJson));
	} else
	{		
		header('Location: index.php');
		exit();	
	}
} else
{
	header('Location: index.php');
	exit();	
}