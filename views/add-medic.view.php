<?php $title = "Ajouter un médecin"; ?>

<?php include('partials/header.php'); ?>
<?php include('partials/errors.php'); ?>

<?php if ( $user->role == "roleUser"): ?>
<!-- debut formulaire ajouter médecin -->
<div id="main-content">

    <div class="container">
		
	  <h1>Ajouter un médecin</h1>

	  <?php include('partials/flash.php'); ?>
	  
	  <form id="form" method="post" class="well col-md-6">

		<!-- Champ email -->
		<div class="form-group">
			<label class="control-label" for="email">Adresse email du médecin(obligatoire):</label>
			<input type="email" class="form-control" name="email" id="email" required="required">
		</div>

		<input type="submit" class="btn btn-primary daily-form" value="Ajouter un médecin" name="add-medic">

      </form>

    </div><!-- /.container -->

    <div class="container">

    	<h2>Vos médecins enregistrés</h2>

		<div class="list-group col-md-6">
	    	<!-- affichage des médecins par mail -->
			<?php		
				foreach ($dataMedicRelation as $key) {
					$medic = $usersDAO->findUserId($key->medic_id);
					$medicActive = medicActive($medic->active);
					echo "<p class=\"list-group-item list-group-item-action list-group-item-$medicActive addMedicActive-$medicActive\">$medic->email</p>";
				}
			?>
    	</div>
    	<!-- fin affichage des médecins par mail -->
    </div>

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