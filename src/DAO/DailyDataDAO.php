<?php

namespace Acme\DAO;
use PDO;
class DailyDataDAO 
{		

	//Trouve toutes les données via un id
	public function findAllDataByUserId($userId)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT DATE_FORMAT(daily_date, '%Y-%m-%d') as 'date' FROM daily_data 
							WHERE user_id = :user_id
							ORDER BY id DESC");
		$q->execute(array(
			'user_id' => $userId
			));

		$data = $q->fetchAll(PDO::FETCH_OBJ);

		return $data;
	}
	
}