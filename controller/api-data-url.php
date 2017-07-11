<?php

include('model/guest.php');
require('model/functions.php');


use Acme\Domain\User;
use Acme\DAO\UserDAO;
use Acme\DAO\DailyDataDAO;

$apiDatasSexe = new UserDAO;
$apiDatas = new DailyDataDAO;
$datas = $apiDatas->findAllDailyDatas();
$outp = "[";
foreach ($datas as $key) {
    if ($outp != "[") {$outp .= ",";}
    $outp .= '{"id":"'  . $key->id . '",';
    $outp .= '"user_id":"'   . $key->user_id . '",';
	$sexId = $apiDatasSexe->findUserId($key->user_id);
	$outp .= '"sexe":"'   . $sexId->sexe . '",';
    $outp .= '"physical_form":"'   . $key->physical_form . '",';
    $outp .= '"psycho_form":"'   . $key->psycho_form . '",';
    $outp .= '"temperature":"'   . $key->temperature . '",';
    $outp .= '"douleur":"'   . $key->pain . '",';
    $outp .= '"weather":"'   . $key->weather . '",';
    $outp .= '"city":"'   . $key->other_city . '",';
    $outp .= '"date":"'. $key->date . '"}'; 
}
$outp .="]";

echo($outp);