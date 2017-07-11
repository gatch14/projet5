<?php
require('model/functions.php');
require('model/constants.php');


use Acme\DAO\UserDAO;
$userDAO = new UserDAO;

//recup mot d epasse
if(isset($_POST['recovery-password'])) 
{
	if(!empty($_POST['email'])) 
	{
		extract($_POST);
		$user = $userDAO->find($email);
		if($userDAO->isInBdd('email', $email, 'users'))
		{

			$token = sha1($user->email+$user->pseudo+time());
		
			$userToken = $userDAO->addToken($token, $user->id);

			$urlToken = SITE_URL.'reset-password&amp;pseudo='.$user->pseudo.'&amp;token='.$token;

				//envoi du mail d activivation
				$to = $email;
				$subject = 'Réinitialisation du mot de passe';

				ob_start();
				require('templates/emails/reset-password.view.php');
				$content = ob_get_clean();

				$headers = 'From: "Journal de bord"<hostingf@web1.hosting1976.fr>'. "\r\n";
				$headers .= 'Reply-to: "Webmaster" <hostingf@web1.hosting1976.fr>'. "\r\n"; 
				$headers .= 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

				mail($to, $subject, $content, $headers);

				message_flash("Mail de réinitialisation envoyé!", 'success');

				header('Location: index.php');
				exit();

		} else
		{
			message_flash("Aucun utilisateur trouvé", 'danger');
			header('Location: index.php');
			exit();
		}
	}
}


require('views/password-recovery.view.php');