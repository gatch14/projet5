<?php

define('DB_HOST', 'localhost');
define('DB_NAME', 'projet5');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');

try{
	$bdd = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);

	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	die('Erreur: '.$e->getMessage());
}