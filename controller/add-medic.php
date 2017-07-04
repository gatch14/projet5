<?php

include('model/auth.php');
require('model/functions.php');
require('model/constants.php');
use Acme\Domain\User;
use Acme\Domain\Medic;
use Acme\DAO\MedicDAO;
use Acme\DAO\RelationDAO;
use Acme\DAO\UserDAO;


if ($_SESSION['user_id'] == $_GET['id']) 
{
	$userDAO = new UserDAO;
	$user = $userDAO->findUserId($_SESSION['user_id']);
} else
{
		header('Location: index.php');
		exit();	
}
 
if (isset($_POST['add-medic']))
{
	if (!empty($_POST['email']))
	{
		extract($_POST);
		$addMedic = new Medic();
		$addMedic->setEmail($email);

		$MedicDao = new MedicDAO;
		$RelationDAO = new RelationDAO;
		// on vérifie dans la bdd si nom du medecin est present
		$medic = $MedicDao->medicInBdd($addMedic);
		$medicData = $MedicDao->findMedicByEmail($email);
		// si present on fait la relation
		if ($medic) 
		{
			
			$relation = $RelationDAO->relationInBdd($user->id, $medicData->id);
			// si ya déja une relation on fait rien et on informe
			if ($relation) 
			{
				message_flash("Vous êtes déja en relation avec ce médecin!", 'info');
				header('Location: '.SITE_URL.'home&id='.$user->id);
				exit();
			} else
			{
				$RelationDAO->createRelation($user->id, $medicData->id);
				message_flash("Vos données vont etre visible par le médecin!", 'success');
				header('Location: '.SITE_URL.'add-medic&id='.$user->id);
				exit();				
			}

		} else
		{	
			// controle si l email n est pas utilisé par autre que roleMedic
			$findRole = $MedicDao->findRoleByEmail($email);
			$emailInBdd = $userDAO->isInBdd('email', $email, 'users');
			if ( ($emailInBdd) AND (  $findRole != 'roleMedic') )
			{
				message_flash("L'email entré n'est pas bon!", 'danger');
				header('Location: '.SITE_URL.'home&id='.$user->id);
				exit();				
			} else
			{	
				$MedicDao->createMedic($addMedic);
				$medicData = $MedicDao->findMedicByEmail($email);
				$RelationDAO->createRelation($user->id, $medicData->id);
				message_flash("Votre médecin n'est pas encore présent", 'warning');
				header('Location: '.SITE_URL.'add-medic&id='.$user->id);
				exit();
			}
		}
	}
}
 
// pour l affichage de la liste des médecins
$relationsDAO = new RelationDAO;
$dataMedicRelation = $relationsDAO->findAllMedicByUserId($user->id);
$usersDAO = new UserDAO;



//On inclut la vue
include('views/add-medic.view.php');