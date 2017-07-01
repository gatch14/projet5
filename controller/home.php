<?php

include('model/auth.php');
require('model/functions.php');
require('model/constants.php');
use Acme\Domain\DailyData;
use Acme\Domain\wMeteo;



if ($_SESSION['user_id'] == $_GET['id']) 
{
	$user = find_user_id($_SESSION['user_id']);
	$daily_data = daily_data_in_bdd(date('Y-m-d'), $user->id);
	$user_daily_data = find_daily_data_id(date('Y-m-d'), $user->id);
} else
{
		header('Location: index.php');
		exit();	
}

// Si le formulaire a  été envoyé
if (isset($_POST['daily-form'])) 
{
	//controle que les champs ne sont pas vide
	if (!empty($_POST['physicalForm']) && 
		!empty($_POST['psychologicalForm']) &&
		!empty($_POST['pain']) &&
		!empty($_POST['other_city'])) 
	{
		extract($_POST);

		//recuperation temperature + temps
		$weather = new wMeteo();
		$code 	 = $weather->getCityCode($_POST['other_city'], 'France');
		$days	 = $weather->getWeather($code, 1);
		$temperature = $days['actuel']['temperature'];
		$weather = $days['jour0']['partie']['n']['icon'];

		//creation daily data
		$DailyData = new DailyData();
		$DailyData->setUser_id($user->id);
		$DailyData->setOther_city($other_city);
		$DailyData->setDaily_date(date('Y-m-d'));
		$DailyData->setPhysical_form($physicalForm);
		$DailyData->setPhysical_form_desc($physicalFormDesc);
		$DailyData->setPsycho_form($psychologicalForm);
		$DailyData->setPsycho_form_desc($psychologicalFormDesc);
		$DailyData->setPain($pain);
		$DailyData->setPain_desc($painDesc);
		$DailyData->setTemperature($temperature);
		$DailyData->setWeather($weather);

		createDailyData($DailyData);

		message_flash("Votre forme du jour a été enregistré, merci!", 'success');

		header('Location: '.SITE_URL.'home&id='.$user->id);
		exit();

	} else 
	{
		extract($_POST);
		$errors = [];
		if (empty($other_city)) {
			$errors[] = "Votre ville n'a pas été remplie";
		}
		if (empty($physicalForm)) {
			$errors[] = "Votre forme physique n'a pas été remplie";
		}
		if (empty($psychologicalForm)) {
			$errors[] = "Votre forme psychologique n'a pas été remplie";
		}
		if (empty($pain)) {
			$errors[] = "Votre douleur n'a pas été remplie";
		}

		save_data();
	}
} else
	{
		clear_input_data();
	}

// Si le 2e formulaire a été envoyé
if (isset($_POST['daily-form-desc'])) 
{
	extract($_POST);
	print_r($user_daily_data->id);
	$DailyData = new DailyData();
	$DailyData->setId($user_daily_data->id);
	$DailyData->setSymptom($symptom);
	$DailyData->setSymptom_desc($symptom_desc);
	$DailyData->setLunch($lunch);
	$DailyData->setOther($other);
	updateDailyData($DailyData);

	message_flash("Vos données ont été enregistrées, merci!", 'success');

	header('Location: '.SITE_URL.'home&id='.$user->id);
}

require('views/home.view.php');


