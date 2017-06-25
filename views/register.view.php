<?php $title = "Code de formulaire d'inscription"; ?>

<?php include('partials/header.php'); ?>

<div id="main-content">

    <div class="container">
		
	  <h1>Formulaire d'inscription</h1>

	  <?php
	  	include('partials/errors.php');
	  ?>


      <form id="form" method="post" class="well col-md-6">

		<!-- Champ pseudo -->
		<div class="form-group">
			<label class="control-label" for="pseudo">Pseudo:</label>
			<input type="text" value="<?= input_data('pseudo') ?>" class="form-control" name="pseudo" id="pseudo" required="required">
		</div>

		<!-- Champ email -->
		<div class="form-group">
			<label class="control-label" for="email">Adresse email:</label>
			<input type="email" value="<?= input_data('email') ?>" class="form-control" name="email" id="email" required="required">
		</div>

		<!-- Champ password -->
		<div class="form-group">
			<label class="control-label" for="password">Mot de passe:</label>
			<input type="password" class="form-control" name="password" id="password" required="required">
		</div>

		<!-- Champ password confirmation-->
		<div class="form-group">
			<label class="control-label" for="password">Confirmer votre mot de passe:</label>
			<input type="password" class="form-control" name="password_confirm" id="password_confirm" required="required" data-parsley-equalto="#password">
		</div>

		<!-- Champ role -->
		<div class="form-group">
			<label class="control-label" for="role">Vous etes ?</label>
			<select name="role">
				<option value="roleUser">Utilisateur</option>
				<option value="roleMedic">Medecin</option>
			</select>
		</div>

		<input type="submit" class="btn btn-primary" value="inscription" name="register">

      </form>

    </div><!-- /.container -->

</div>


<?php include('partials/footer.php'); ?>