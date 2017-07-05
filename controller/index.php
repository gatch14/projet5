<?php

require('model/functions.php');
require('model/constants.php');
use Acme\DAO\UserDAO;


if (logged()) 
{
	$userDAO = new UserDAO;
	$user = $userDAO->findUserId($_SESSION['user_id']);
} 
include('views/index.view.php');
