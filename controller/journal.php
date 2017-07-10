<?php

include('model/auth.php');
require('model/functions.php');
require('model/constants.php');
use Acme\Domain\User;
use Acme\DAO\UserDAO;
use Acme\DAO\MedicDAO;
use Acme\DAO\DailyDataDAO;
use Acme\DAO\RelationDAO;

$MedicDAO = new MedicDAO;
$medicRole = $MedicDAO->findRoleById($_SESSION['user_id']);
$relation = new RelationDAO;
$testRelation = $relation->relationInBdd($_GET['id'], $_SESSION['user_id']);

if ( ($_SESSION['user_id'] == $_GET['id']) 
	OR ($medicRole->role == "roleMedic" AND $testRelation)) 
{


	$userDAO = new UserDAO;
	$user = $userDAO->findUserId($_SESSION['user_id']);

	$datadays = new DailyDataDAO;
	$datas7 = $datadays->findAllDataByUserIdLast7Days($_GET['id']);
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

	$datas30 = $datadays->findAllDataByUserIdLast30Days($_GET['id']);
	$compteur30 = 0;
	$FormGood30 = 0;
	$FormMiddle30 = 0;
	$FormNotGood30 = 0;
	foreach ($datas30 as $key) {
		$total = $key->physical_form + $key->psycho_form + $key->pain;
		$compteur30 ++;

		if ($total > 11) {
			$FormGood30 ++;
		} elseif ($total > 6) {
			$FormMiddle30 ++;
		} else {
			$FormNotGood30 ++;
		}
	}


} else
{
		header('Location: index.php');
		exit();	
}
 
//On inclut la vue
include('views/journal.view.php');
