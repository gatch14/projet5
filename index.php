<?php
//On démarre la session
session_start();
 
//On se connecte à MySQL
require('config/database.php');
require('model/functions.php');
require('vendor/autoload.php');
 
//On inclut le contrôleur s'il existe et s'il est spécifié
if (!empty($_GET['page']) && is_file('controller/'.$_GET['page'].'.php'))
{
        include 'controller/'.$_GET['page'].'.php';
}
else
{
        include 'controller/index.php';
}
