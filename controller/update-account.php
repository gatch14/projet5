<?php

include('model/auth.php');
require('model/functions.php');
require('model/constants.php');
use Acme\Domain\User;
use Acme\Domain\Medic;
use Acme\DAO\UserDAO;
use Acme\DAO\MedicDAO;


if ($_SESSION['user_id'] == $_GET['id']) 
{
	$userDAO = new UserDAO;
	$user = $userDAO->findUserId($_SESSION['user_id']);
	$userbirthdayDay = $userDAO->findBirthdayDayByUserId($_SESSION['user_id']);
	$userbirthdayMonth = $userDAO->findBirthdayMonthByUserId($_SESSION['user_id']);
	$userbirthdayYear = $userDAO->findBirthdayYearByUserId($_SESSION['user_id']);

} else
{
		header('Location: index.php');
		exit();	
}
 
if (isset($_POST['update-account-roleUser']))
{
	extract($_POST);

	$updateUser = new User();
	$updateUser->setId($_SESSION['user_id']);
	$updateUser->setName(echap($name));
	$updateUser->setNickname(echap($nickname));
	$updateUser->setCity(echap($city));
	$updateUser->setSexe($sexe);
	$updateUser->setBirthday($day, $month, $year);
	$updateUser->setMaladie(echap($maladie));
	$updateUser->setTraitement(echap($traitement));
	$userDAO->updateUser($updateUser);

	message_flash("Votre profil a été mis à jour", 'success');
	header('Location: '.SITE_URL.'update-account&id='.$user->id);
	exit();
}
 
if (isset($_POST['update-account-roleMedic']))
{
	extract($_POST);

	$updateMedic = new Medic();
	$updateMedic->setId($_SESSION['user_id']);
	$updateMedic->setName(echap($name));
	$updateMedic->setNickname(echap($nickname));
	$updateMedic->setCity(echap($city));
	$updateMedic->setSpeciality(echap($speciality));


	$MedicDAO = new MedicDAO;
	$MedicDAO->updateMedic($updateMedic);

	message_flash("Votre profil a été mis à jour", 'success');
	header('Location: '.SITE_URL.'update-account&id='.$user->id);
	exit();
}
 
//On inclut la vue
include('views/update-account.view.php');