<?php $title = "Mot de passe perdu"; ?>

<?php include('partials/header.php'); ?>

<div id="main-content">

	<div class="container">
		
		<h1>Récupération du mot de passe</h1>

			<?php
				include('partials/errors.php');
			?>

			<?php include('partials/flash.php'); ?>


		<form id="form" method="post" class="well col-md-6">

			<!-- Champ mail -->
			<div class="form-group">
				<label class="control-label" for="email">Adresse email:</label>
				<input type="email" value="<?= input_data('email') ?>" class="form-control" name="email" id="email" required="required">
			</div>

			<input type="submit" class="btn btn-primary daily-form" value="Réinitialisation mot de passe" name="recovery-password">

		</form>

	</div><!-- /.container -->

</div>


<?php include('partials/footer.php'); ?>