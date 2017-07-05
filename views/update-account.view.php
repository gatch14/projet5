<?php $title = "Page de profil"; ?>

<?php include('partials/header.php'); ?>
<?php include('partials/errors.php'); ?>

<?php if ( ($user->role == "roleUser") OR ($user->role == "roleMedic") ): ?>
<!-- debut formulaire profil user -->
<div id="main-content">

    <div class="container">
		
	  <h1>Modifier votre profil</h1>

	  <form id="form" method="post" class="well col-md-6">

		<!-- Champ nom -->
		<div class="form-group">
			<label class="control-label" for="name">Nom:</label>
			<input type="text" value="<?= echap($user->name) ?>" class="form-control" name="name" id="name">
		</div>

		<!-- Champ prenom -->
		<div class="form-group">
			<label class="control-label" for="nickname">Prenom:</label>
			<input type="text" value="<?= echap($user->nickname) ?>" class="form-control" name="nickname" id="nickname">
		</div>

		<!-- Champ ville -->
		<div class="form-group">
			<label class="control-label" for="city">Votre ville:</label>
			<input type="text" value="<?= echap($user->city) ?>" class="form-control" name="city" id="city">
		</div>
		<?php if ($user->role == "roleUser") : ?>
		<!-- Champ sexe -->
		<div class="form-group">
			<label class="control-label" for="sexe">Sexe</label>
			<select name="sexe">
				<option selected>Votre choix</option>
				<option value="man">Homme</option>
				<option value="woman">Femme</option>
			</select>
		</div>

		<!-- Champ date de naissance -->
		<div class="form-group">
			<label class="control-label" for="age">Votre date de naissance:</label>
			<select name="day">
				<option selected>Jour</option>
				<?php
					for($day = 1; $day <= 31; $day++)
					{
				?>
				<option value="<?= $day ?>"><?= $day ?></option>
				<?php
					}
				?>				
			</select>
			<select name="month">
				<option selected>Mois</option>
				<?php
					for($month = 1; $month <= 12; $month++)
					{
				?>
				<option value="<?= $month ?>"><?= $month ?></option>
				<?php
					}
				?>				
			</select>
			<select name="year">
				<option selected>Année</option>
				<?php
					for($year = 1920; $year <= date('Y'); $year++)
					{
				?>
				<option value="<?= $year ?>"><?= $year ?></option>
				<?php
					}
				?>				
			</select>
		</div>

		<!-- Champ type maladie -->
		<div class="form-group">
			<label class="control-label" for="maladie">Type de maladie:</label>
			<input type="text" value="<?= echap($user->maladie) ?>" class="form-control" name="maladie" id="maladie">
		</div>

		<!-- Champ type traitement -->
		<div class="form-group">
			<label class="control-label" for="traitement">Nom du traitement (médicament):</label>
			<input type="text" value="<?= echap($user->traitement) ?>" class="form-control" name="traitement" id="traitement">
		</div>
		
		<?php endif; ?>

		<?php if ($user->role == "roleMedic") : ?>
		<!-- Champ specialité medecin -->
		<div class="form-group">
			<label class="control-label" for="speciality">Spécialité:</label>
			<input type="text" value="<?= echap($user->speciality) ?>" class="form-control" name="speciality" id="speciality">
		</div>
		<?php endif; ?>

		<input type="submit" class="btn btn-primary" value="Modifier votre profil" name="update-account-<?= $user->role ?>">

      </form>

    </div><!-- /.container -->

</div>
<!-- fin formulaire profil user -->



<?php elseif  ($user->role == "roleAdmin"): ?>
	<div id="main-content">

	    <div class="container">
		  <h1>Administration profil</h1>
		  <h1>Bonjour <?= echap($user->pseudo) ?></h1>
		  <p>Role <?= echap($user->role) ?></p>
	    </div><!-- /.container -->

	</div>
<?php else: ?>
	<div id="main-content">

	    <div class="container">
		  <h1>Erreur</h1>
	    </div><!-- /.container -->

	</div>
<?php endif; ?>



<?php include('partials/footer.php'); ?>