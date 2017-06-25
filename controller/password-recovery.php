<?php
require('model/functions.php');
require('model/constants.php');



//recup mot d epasse
if(isset($_POST['recovery-password'])) 
{
	if(!empty($_POST['email'])) 
	{
		extract($_POST);
		$user = find($email);
		if(is_in_bdd('email', $email, 'users'))
		{

			$token = sha1($user->email+$user->pseudo+time());
		
			$userToken = addToken($token, $user->id);

			$urlToken = SITE_URL.'reset-password&amp;pseudo='.$user->pseudo.'&amp;token='.$token;

				//envoi du mail d activivation
				$to = $email;
				$subject = 'Réinitialisation du mot de passe';

				ob_start();
				require('templates/emails/reset-password.view.php');
				$content = ob_get_clean();

				$headers = 'MIME-Version: 1.0' . "\r\n";
				$headers = 'Content-type: text/html; charset=utf-8' . "\r\n";

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

