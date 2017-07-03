<?php $title = "Votre journal de bord"; ?>

<?php include('partials/header.php'); ?>
<?php include('partials/errors.php'); ?>

<?php if ( $user->role == "roleUser"): ?>
<!-- debut formulaire ajouter médecin -->
<div id="main-content">

    <div class="container">
		
	  <h1>Journal de bord</h1>

	  
	<!-- define the calendar element -->
	<div id="my-calendar" class="col-md-6"></div>

    </div><!-- /.container -->

</div>
<!-- fin formulaire profil user -->

<?php else: ?>
	<div id="main-content">

	    <div class="container">
		  <h1>Erreur</h1>
	    </div><!-- /.container -->

	</div>
<?php endif; ?>



<?php include('partials/footer.php'); ?>