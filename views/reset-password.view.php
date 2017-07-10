<?php $title = "Réinitialiser le mot de passe"; ?>

<?php include('partials/header.php'); ?>

<div id="main-content">

    <div class="container">
		
	  <h1>Réinitialiser votre mot de passe</h1>

			<?php
				include('partials/errors.php');
			?>

			<?php include('partials/flash.php'); ?>

      <form is="form" method="post" class="well col-md-6">

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

		<input type="submit" class="btn btn-primary daily-form" value="Changer mon mot de passe" name="new-password">

      </form>

    </div><!-- /.container -->

</div>


<?php include('partials/footer.php'); ?>