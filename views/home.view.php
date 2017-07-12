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

			<?php include('partials/flash.php'); ?>
			
			<?php if ($daily_data == 0): ?>
				<form id="form-daily" method="post" class="well col-sm-8 col-xs-12">

					<!-- Champ symptome -->
					<div class="form-group">
						<label class="control-label" for="other_city">Ville du jour(obligatoire):</label>
						<input type="text" value="<?= echap($user->city) ?>" class="form-control" name="other_city" id="other_city" required="required">
					</div>
					<!-- Champ forme physique -->
					<div class="form-group">
						<label class="control-label col-xs-12 text-center" for="physicalForm"><i class="fa fa-info-circle iconInfo" title="Note de 1 à 5. 1 étant le plus bas"></i> Forme physique(obligatoire):</label>
						<div class="form-check form-check-inline col-xs-2 col-xs-offset-1">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="physicalForm" value="1"> 1
							</label>
						</div>
						<div class="form-check form-check-inline col-xs-2">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="physicalForm" value="2"> 2
							</label>
						</div>
						<div class="form-check form-check-inline col-xs-2">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="physicalForm" value="3"> 3
							</label>
						</div>
						<div class="form-check form-check-inline col-xs-2">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="physicalForm" value="4"> 4
							</label>
						</div>
						<div class="form-check form-check-inline col-xs-2">
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
						<label class="control-label col-xs-12 text-center" for="psychologicalForm"><i class="fa fa-info-circle iconInfo" title="Note de 1 à 5. 1 étant le plus bas"></i> Forme psychologique(obligatoire):</label>
						<div class="form-check form-check-inline col-xs-2 col-xs-offset-1">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="psychologicalForm" value="1"> 1
							</label>
						</div>
						<div class="form-check form-check-inline col-xs-2">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="psychologicalForm" value="2"> 2
							</label>
						</div>
						<div class="form-check form-check-inline col-xs-2">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="psychologicalForm" value="3"> 3
							</label>
						</div>
						<div class="form-check form-check-inline col-xs-2">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="psychologicalForm" value="4"> 4
							</label>
						</div>
						<div class="form-check form-check-inline col-xs-2">
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
						<label class="control-label col-xs-12 text-center" for="pain"><i class="fa fa-info-circle iconInfo" title="Note de 1 à 5. 1 étant le plus bas"></i> Douleur(obligatoire, 1:rien, 5:très mal):</label>
						<div class="form-check form-check-inline col-xs-2 col-xs-offset-1">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="pain" value="5"> 1
							</label>
						</div>
						<div class="form-check form-check-inline col-xs-2">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="pain" value="4"> 2
							</label>
						</div>
						<div class="form-check form-check-inline col-xs-2">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="pain" value="3"> 3
							</label>
						</div>
						<div class="form-check form-check-inline col-xs-2">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="pain" value="2"> 4
							</label>
						</div>
						<div class="form-check form-check-inline col-xs-2">
							<label class="form-check-label">
								<input class="form-check-input" type="radio" name="pain" value="1"> 5
							</label>
						</div>
					</div>

					<!-- Champ douleur descirption-->
					<div class="form-group">
						<label class="control-label text-center" for="painDesc">Description de votre douleur:</label>
						<textarea class="form-control"  placeholder="Vous pouvez détailler ici" name="painDesc" rows="3"><?= input_data('painDesc') ?></textarea>
					</div>

					<div class="alert alert-danger">Important !!! Une fois validé, ce formulaire ne sera plus modifiable.</div>
					<input type="submit" class="btn btn-primary daily-form" value="Ajouter forme du jour" name="daily-form">
				</form>

			<?php else: ?>
				<div id="main-content">

					<div class="container">

						<form id="form" method="post" class="well col-sm-8 col-xs-12">
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

							<input type="submit" class="btn btn-primary daily-form" value="Ajouter des détails du jour" name="daily-form-desc">
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

			<div class="row">
				<div class=" col-xs-12">
					<div class="main-box clearfix">
						<div class="table-responsive">
							<table class="table user-list">
								<thead>
									<tr>
										<th><span class="userListTh">Nom</span></th>
										<th><span class="userListTh">Prénom</span></th>
										<th><span class="userListTh">Ville</span></th>
										<th><span class="userListTh">Email</span></th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>

									<?php
									foreach ($dataUserRelation as $key) {
										$userRelation = $usersDAO->findUserId($key->user_id);

										echo "<tr class=\"userListTr\">
										<td>
											<span class=\"userList\">$userRelation->name</span>
										</td>
										<td>
											<span class=\"userList\">$userRelation->nickname</span>
										</td>
										<td>
											<span class=\"userList\">$userRelation->city</span>
										</td>
										<td>
											<a href=\"mailto:$userRelation->email\" class=\"userList\">$userRelation->email</a>
										</td>
										<td>
											<a href=\"?page=journal&id=$userRelation->id\" class=\"table-link\" title=\"Voir les statistiques\">
												<span class=\"fa-stack infoUserIcon\">
													<i class=\"fa fa-square fa-stack-2x\"></i>
													<i class=\"fa fa-search-plus fa-stack-1x fa-inverse\"></i>
												</span>
											</a>
										</td>
									</tr>";
								}
								?>




								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>



	</div><!-- /.container -->

</div>
<!-- Fin role medic -->




<?php elseif  ($user->role == "roleAdmin"): ?>
	<div id="main-content">

		<div class="container">
			<h1>Administration</h1>


			<?php
				include('partials/errors.php');
			?>

			<?php include('partials/flash.php'); ?>
			
			<div class="row">
				<div class=" col-sm-8 col-xs-12">
					<div class="main-box clearfix">
						<div class="table-responsive">
							<table class="table user-list">
								<thead>
									<tr>
										<th><span class="userListTh">Id</span></th>
										<th><span class="userListTh">Nom</span></th>
										<th><span class="userListTh">Prénom</span></th>
										<th><span class="userListTh">Email</span></th>
										<th><span class="userListTh">Role</span></th>
										<th>&nbsp;</th>
									</tr>
								</thead>
								<tbody>

									<?php


									foreach ($dataUsersList as $userInBdd) 
									{
										echo "<tr class=\"userListTr\">
										<td>
											<span class=\"userList\">$userInBdd->id</span>
										</td>
										<td>
											<span class=\"userList\">$userInBdd->name</span>
										</td>
										<td>
											<span class=\"userList\">$userInBdd->nickname</span>
										</td>
										<td>
											<a href=\"mailto:$userInBdd->email\" class=\"userList\">$userInBdd->email</a>
										</td>
										<td>
											<span class=\"userList\">$userInBdd->role</span>
										</td>
										<td>
											<a href=\"?page=admin-update-account&id=$userInBdd->id\" class=\"table-link\" title=\"Voir le profil\">
												<span class=\"fa-stack infoUserIcon\">
													<i class=\"fa fa-square fa-stack-2x\"></i>
													<i class=\"fa fa-search-plus fa-stack-1x fa-inverse\"></i>
												</span>
											</a>
										</td>
									</tr>";
								}

								?>


							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

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