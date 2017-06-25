<?php

include('model/auth.php');
require('model/functions.php');
require('model/constants.php');


if ($_SESSION['user_id'] == $_GET['id']) 
{
	$user = find_user_id($_SESSION['user_id']);
} else
{
		header('Location: index.php');
		exit();	
}
require('views/home.view.php');


