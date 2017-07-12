<?php $title = "Page de profil"; ?>

<?php include('partials/header.php'); ?>

<?php if ( ($user->role == "roleUser") OR ($user->role == "roleMedic") ): ?>
<!-- debut formulaire profil user -->
<div id="main-content">

    <div class="container">
		
	  <h1>Modifier votre profil</h1>

	  <?php include('partials/flash.php'); ?>
	  <?php include('partials/errors.php'); ?>

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
				<option value="" <?= userSexe( "" , $user->sexe)?>>Votre choix</option>
				<option value="man" <?= userSexe( "man" , $user->sexe)?>>Homme</option>
				<option value="woman" <?= userSexe( "woman" , $user->sexe)?>>Femme</option>
			</select>
		</div>

		<!-- Champ date de naissance -->
		<div class="form-group">
			<label class="control-label" for="age">Votre date de naissance:</label>
			<select name="day">
				<option >Jour</option>
				<?php
					for($day = 01; $day <= 31; $day++)
					{
				?>
				<option value="<?= $day ?>" <?= userSexe( sprintf("%02d", $day) , $userbirthdayDay->dateDay)?> ><?= $day ?></option>
				<?php
					}
				?>				
			</select>
			<select name="month">
				<option>Mois</option>
				<?php
					for($month = 1; $month <= 12; $month++)
					{
				?>
				<option value="<?= $month ?>" <?= userSexe( sprintf("%02d", $month) , $userbirthdayMonth->dateMonth)?>><?= $month ?></option>
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
				<option value="<?= $year ?>" <?= userSexe( $year , $userbirthdayYear->dateYear)?>><?= $year ?></option>
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

		<input type="submit" class="btn btn-primary daily-form" value="Modifier votre profil" name="update-account-<?= $user->role ?>">

      </form>

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