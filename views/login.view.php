<?php $title = "Connexion"; ?>

<?php include('partials/header.php'); ?>

<div id="main-content">

    <div class="container">
		
	  <h1>Se connecter</h1>

	  <?php
	  	include('partials/errors.php');
	  ?>


      <form id="form" method="post" class="well col-md-6">

		<!-- Champ identifiant -->
		<div class="form-group">
			<label class="control-label" for="identifiant">Pseudo ou adresse email:</label>
			<input type="text" value="<?= input_data('identifiant') ?>" class="form-control" name="identifiant" id="identifiant" required="required">
		</div>

		<!-- Champ password -->
		<div class="form-group">
			<label class="control-label" for="password">Mot de passe:</label>
			<input type="password" class="form-control" name="password" id="password" required="required">
		</div>

		<input type="submit" class="btn btn-primary" value="Connexion" name="login">

		<p>
			<a href="index.php?page=password-recovery" class="text-muted pull-right">Mot de passe oublié?</a>
		</p>

      </form>

    </div><!-- /.container -->

</div>


<?php include('partials/footer.php'); ?>