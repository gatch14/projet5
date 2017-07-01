<?php $title = "Ajouter un médecin"; ?>

<?php include('partials/header.php'); ?>
<?php include('partials/errors.php'); ?>

<?php if ( $user->role == "roleUser"): ?>
<!-- debut formulaire ajouter médecin -->
<div id="main-content">

    <div class="container">
		
	  <h1>Ajouter un médecin</h1>

	  <form id="form" method="post" class="well col-md-6">

		<!-- Champ email -->
		<div class="form-group">
			<label class="control-label" for="email">Adresse email du médecin(obligatoire):</label>
			<input type="email" class="form-control" name="email" id="email" required="required">
		</div>

		<input type="submit" class="btn btn-primary" value="Ajouter un médecin" name="add-medic">

      </form>

    </div><!-- /.container -->

    <div class="container">

      <h2>Vos médecins enregistrés</h2>

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