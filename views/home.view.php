<?php $title = "Page du compte"; ?>

<?php include('partials/header.php'); ?>

<!-- Debut role user -->
<?php if ($user->role == "roleUser"): ?>
	<div id="main-content">

	    <div class="container">
			
		  <h1>Bonjour <?= echap($user->pseudo) ?></h1>


			<?php
	  			include('partials/errors.php');
	  		?>
		
			<?php if ($daily_data == 0): ?>
			<form id="form-daily" method="post" class="well col-md-6">

			<!-- Champ symptome -->
			<div class="form-group">
				<label class="control-label" for="other_city">Ville du jour(obligatoire):</label>
				<input type="text" value="<?= echap($user->city) ?>" class="form-control" name="other_city" id="other_city" required="required">
			</div>

			<!-- Champ forme physique -->
			<div class="form-group">
				<label class="control-label col-md-12 text-center" for="physicalForm">Forme physique(obligatoire):</label>
				<div class="form-check form-check-inline col-md-2 col-md-offset-1">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="physicalForm" value="1"> 1
				  </label>
				</div>
				<div class="form-check form-check-inline col-md-2">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="physicalForm" value="2"> 2
				  </label>
				</div>
				<div class="form-check form-check-inline col-md-2">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="physicalForm" value="3"> 3
				  </label>
				</div>
				<div class="form-check form-check-inline col-md-2">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="physicalForm" value="4"> 4
				  </label>
				</div>
				<div class="form-check form-check-inline col-md-2">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="physicalForm" value="5"> 5
				  </label>
				</div>
			</div>

			<!-- Champ forme physique description-->
			<div class="form-group">
				<label class="control-label text-center" for="physicalFormDesc">Description de votre ressenti physique:</label>
				<textarea class="form-control" name="physicalFormDesc" placeholder="Vous pouvez détailler ici" rows="3"><?= input_data('physicalFormDesc') ?></textarea>
			</div>

			<!-- Champ forme psychologique -->
			<div class="form-group">
				<label class="control-label col-md-12 text-center" for="psychologicalForm">Forme psychologique(obligatoire):</label>
				<div class="form-check form-check-inline col-md-2 col-md-offset-1">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="psychologicalForm" value="1"> 1
				  </label>
				</div>
				<div class="form-check form-check-inline col-md-2">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="psychologicalForm" value="2"> 2
				  </label>
				</div>
				<div class="form-check form-check-inline col-md-2">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="psychologicalForm" value="3"> 3
				  </label>
				</div>
				<div class="form-check form-check-inline col-md-2">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="psychologicalForm" value="4"> 4
				  </label>
				</div>
				<div class="form-check form-check-inline col-md-2">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="psychologicalForm" value="5"> 5
				  </label>
				</div>
			</div>

			<!-- Champ forme psychologique description-->
			<div class="form-group">
				<label class="control-label text-center" for="psychologicalFormDesc">Description de votre ressenti psychologique:</label>
				<textarea class="form-control" name="psychologicalFormDesc" placeholder="Vous pouvez détailler ici" rows="3"><?= input_data('psychologicalFormDesc') ?></textarea>
			</div>

			<!-- Champ douleur -->
			<div class="form-group">
				<label class="control-label col-md-12 text-center" for="pain">Douleur(obligatoire):</label>
				<div class="form-check form-check-inline col-md-2 col-md-offset-1">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="pain" value="1"> 1
				  </label>
				</div>
				<div class="form-check form-check-inline col-md-2">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="pain" value="2"> 2
				  </label>
				</div>
				<div class="form-check form-check-inline col-md-2">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="pain" value="3"> 3
				  </label>
				</div>
				<div class="form-check form-check-inline col-md-2">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="pain" value="4"> 4
				  </label>
				</div>
				<div class="form-check form-check-inline col-md-2">
				  <label class="form-check-label">
				    <input class="form-check-input" type="radio" name="pain" value="5"> 5
				  </label>
				</div>
			</div>

			<!-- Champ douleur descirption-->
			<div class="form-group">
				<label class="control-label text-center" for="painDesc">Description de votre douleur:</label>
				<textarea class="form-control"  placeholder="Vous pouvez détailler ici" name="painDesc" rows="3"><?= input_data('painDesc') ?></textarea>
			</div>

			<div class="alert alert-danger">Important !!! Une fois validé, ce formulaire ne sera plus modifiable.</div>
			<input type="submit" class="btn btn-primary" value="Ajouter forme du jour" name="daily-form">
			</form>

			<?php else: ?>
				<div id="main-content">

				    <div class="container">

				    	<h2>Données pouvant etre utile</h2>
						<form id="form" method="post" class="well col-md-6">
				    	<div class="alert alert-info">Vous pouvez modifier les données jusque minuit.</div>

						<!-- Champ symptome -->
						<div class="form-group">
							<label class="control-label" for="symptom">Symptomes(séparé par une virgule):</label>
							<input type="text" value="<?= echap($user_daily_data->symptom) ?>" class="form-control" name="symptom" id="symptom">
						</div>

						<!-- Champ symptome descirption-->
						<div class="form-group">
							<label class="control-label text-center" for="symptom_desc">Description de vos symptomes du jour:</label>
							<textarea class="form-control" placeholder="Vous pouvez détailler ici"  id="symptom_desc" name="symptom_desc" rows="3"><?= echap($user_daily_data->symptom_desc) ?></textarea>
						</div>

						<!-- Champ repas-->
						<div class="form-group">
							<label class="control-label text-center" for="lunch">Description de vos repas du jour:</label>
							<textarea class="form-control" name="lunch" placeholder="Vous pouvez détailler ici" rows="3"><?= echap($user_daily_data->lunch) ?></textarea>
						</div>

						<!-- Champ autre-->
						<div class="form-group">
							<label class="control-label text-center" for="other">Divers, vous pouvez ajouter ce que vous voulez:</label>
							<textarea class="form-control" name="other" placeholder="Vous pouvez détailler ici" rows="3"><?= echap($user_daily_data->other) ?></textarea>
						</div>

						<input type="submit" class="btn btn-primary" value="Ajouter des détails du jour" name="daily-form-desc">
						</form>

				    </div><!-- /.container -->

				</div>
			<?php endif; ?>

		</div><!-- /.container -->

	</div>
<!-- Fin role user -->

<!-- Debut role medic -->
<?php elseif ($user->role == "roleMedic"): ?>
	<div id="main-content">

	    <div class="container">
			
			<h1>Bonjour <?= echap($user->pseudo) ?></h1>

			<!-- Début listing utilisateur du médecin -->
			<?php
				foreach ($dataUserRelation as $key) {
					$userRelation = $usersDAO->findUserId($key->user_id);

					echo "<p>$userRelation->email  <a href=\"http://localhost/projet5/index.php?page=journal&id=$userRelation->id\" target=\"_blank\">Voir ses données</a><p>";
				}
			?>
			<!-- Fin listing utilisateur du médecin -->

	    </div><!-- /.container -->

	</div>
<!-- Fin role medic -->




<?php elseif  ($user->role == "roleAdmin"): ?>
	<div id="main-content">

	    <div class="container">
		  <h1>Administration</h1>
		  <h1>Bonjour <?= echap($user->pseudo) ?></h1>
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