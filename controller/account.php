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
 
//On inclut le modèle
//include(dirname(__FILE__).'/../modeles/news.php');
 
/* On effectue ici diverses actions, comme supprimer des news, par exemple. ;)
Il n'y en aura aucune dans ce tutoriel pour rester simple, mais libre à vous d'en rajouter. */
 
//On récupère les news
//$news = recuperer_news();
 
//On inclut la vue
include('views/account.view.php');
