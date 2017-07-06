<?php

include('model/auth.php');
require('model/functions.php');
require('model/constants.php');
use Acme\Domain\User;
use Acme\DAO\UserDAO;
use Acme\DAO\MedicDAO;
use Acme\DAO\DailyDataDAO;

$MedicDAO = new MedicDAO;
$medicRole = $MedicDAO->findRoleById($_SESSION['user_id']);

if ( ($_SESSION['user_id'] == $_GET['id']) 
	OR ($medicRole->role == "roleMedic")) 
{
	$userDAO = new UserDAO;
	$user = $userDAO->findUserId($_SESSION['user_id']);


	$data7days = new DailyDataDAO;
	$datas7 = $data7days->findAllDataByUserIdLast7Days($_GET['id']);
	$compteur = 0;
	$FormGood = 0;
	$FormMiddle = 0;
	$FormNotGood = 0;
	foreach ($datas7 as $key) {
		$total = $key->physical_form + $key->psycho_form + $key->pain;
		$compteur ++;

		if ($total > 11) {
			$FormGood ++;
		} elseif ($total > 6) {
			$FormMiddle ++;
		} else {
			$FormNotGood ++;
		}
	}
} else
{
		header('Location: index.php');
		exit();	
}
 
//On inclut la vue
include('views/journal.view.php');
