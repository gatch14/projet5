<?php

namespace Acme\DAO;
use PDO;
class DailyDataDAO 
{		

	//Trouve toutes les données via un id
	public function findAllDataByUserId($userId)
	{
		global $bdd;

		$q = $bdd->prepare("SELECT  date_format(daily_date, '%Y-%m-%d') AS date, 
									id,
									physical_form,
									psycho_form,
									pain,
									physical_form_desc,
									psycho_form_desc,
									pain_desc,
									symptom,
									symptom_desc,
									lunch,
									other,
									other_city,
									temperature,
									weather
							FROM daily_data 
							WHERE user_id = :user_id
							ORDER BY id DESC");
		$q->execute(array(
			'user_id' => $userId
			));

		$data = $q->fetchAll(PDO::FETCH_OBJ);

		return $data;
	}
	
}