<?php

include('model/guest.php');
require('model/constants.php');
require('model/functions.php');


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

		//formatage donnée json pour le calendrier
		echo '[';
		$modal = '';
		$className = '';
		foreach($dataJson as $key){
					$modal .= '{"date":"'.$key->date.'",
							    "badge":true,
							    "title":"Vos données enregistrées ce jour. ",
								"classname":"'.className($key->physical_form, $key->psycho_form, $key->pain).'",
								"body":"<p class=\"modal-text-body\">Vous étiez à '.$key->other_city.'  <img src=\"assets/img/pic-meteo/'.$key->weather.'.png\">  '.$key->temperature.'°</p><span class=\"modal-text-body\">forme physique :</span><img class=\"img-thumbnail\" src=\"assets/img/smileys/smiley-'.$key->physical_form.'.png\"></br><span class=\"modal-text-body\">forme psychologique :</span><img class=\"img-thumbnail\" src=\"assets/img/smileys/smiley-'.$key->psycho_form.'.png\"></br><span class=\"modal-text-body\">Douleur :</span><img class=\"img-thumbnail\" src=\"assets/img/smileys/smiley-'.$key->pain.'.png\"><hr><p><span class=\"modal-text-body\">Description de la forme physique:</span> '.emptyDesc($key->physical_form_desc).'</p><p><span class=\"modal-text-body\">Description de la forme psychologique:</span> '.emptyDesc($key->psycho_form_desc).'</p><p><span class=\"modal-text-body\">Description des douleurs:</span> '.emptyDesc($key->pain_desc).'</p><p><span class=\"modal-text-body\">Vos symptomes du jour:</span> '.emptyDesc($key->symptom).'</p><p><span class=\"modal-text-body\">Description des symptomes du jour:</span> '.emptyDesc($key->symptom_desc).'</p><p><span class=\"modal-text-body\">Repas du jour:</span> '.emptyDesc($key->lunch).'</p><p><span class=\"modal-text-body\">Divers:</span> '.emptyDesc($key->other).'</p>",
		
							    "footer":"<button class=\"btn btn-primary\" type=\"button\" data-dismiss=\"modal\">Fermer</button>"}, ';}
		echo rtrim($modal, ', ');
		echo ']';

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