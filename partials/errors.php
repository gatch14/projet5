<?php
	// affichage des erreurs si il y en a ( vérificatin des champs )
	if (isset($errors) && count($errors) != 0) 
	{
	  	echo '<div class="alert alert-danger">
	  			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
	  		foreach ($errors as $error) 
	  		{
	  			echo $error.'<br />';
	  		}
	    echo '</div>';
	 }