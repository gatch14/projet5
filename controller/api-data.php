<?php

include('model/guest.php');
require('model/functions.php');
require('model/constants.php');


use Acme\Domain\User;
use Acme\DAO\UserDAO;
use Acme\DAO\DailyDataDAO;



$apiDatas = new DailyDataDAO;
$datas = $apiDatas->findAllDailyDatas();
//print_r(json_encode($datas));

include('views/api-data.view.php');

