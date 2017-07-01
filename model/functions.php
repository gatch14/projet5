<?php
//funciton echap pour htmlspecialchars
if (!function_exists('echap')) 
{
	function echap($string)
	{
		if ($string) 
		{
			return htmlspecialchars($string);
		}
	}
}

//garde des messages en session
if (!function_exists('message_flash')) 
{
	function message_flash($message, $type = 'info')
	{
		$_SESSION['notification']['message'] = $message;
		$_SESSION['notification']['type'] = $type;
	}
}


//sauvegarde des infos dans le formulaire pour eviter de reecrire sauf password
if (!function_exists('save_data')) 
{
	function save_data()
	{
		foreach ($_POST as $key => $value) 
		{
			if(strpos($key, 'password') === false)
			{
				$_SESSION['input'][$key] = $value;
			}
			
		}
	}
}

//retourne les infos sauvegarder de save_data()
if (!function_exists('input_data')) 
{
	function input_data($key)
	{
		if (!empty($_SESSION['input'][$key])) 
		{
			return echap($_SESSION['input'][$key]);	
		} else
		{
			return null;
		}
	}		
}

//supprimes les infos stocké via save_data() si on retourne sur la page
if (!function_exists('clear_input_data')) 
{
	function clear_input_data()
	{
		if (isset($_SESSION['input'])) 
		{
			$_SESSION['input'] = [];	
		}
	}		
}

//etat active des liens nav
if (!function_exists('class_active')) 
{
	function class_active($file)
	{
		$page = $_GET['page'];

		if ( $file == $page) 
		{
			return "active";
		} else
		{
			return "";
		}
	}
}

//Vérification utilisateur connecté
if (!function_exists('logged')) 
{
	function logged()
	{
		return isset($_SESSION['user_id']) || isset($_SESSION['pseudo']);
	}		
}