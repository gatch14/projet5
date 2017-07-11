<?php $title = "Profil de <?= $adminUserUpdate->pseudo ?>"; ?>

<?php include('partials/header.php'); ?>


<?php if ($user->role == "roleAdmin"): ?>
<!-- debut formulaire ajouter médecin -->
<div id="main-content">

    <div class="container">
		
	  <h1>Profil de <?= $adminUserUpdate->pseudo ?></h1>

	  <?php include('partials/flash.php'); ?>
	<?php include('partials/errors.php'); ?>
	  
	  <form id="admin-update-user" method="post" class="well col-sm-8 col-xs-12">

		<!-- Champ pseudo -->
		<div class="form-group">
			<label class="control-label" for="pseudo">Pseudo:</label>
			<input type="text" value="<?= echap($adminUserUpdate->pseudo) ?>" class="form-control" name="pseudo" id="pseudo" required="required">
		</div>


		<!-- active -->

		<div class="form-group">
			<label class="control-label" for="active">Etat</label>
			<select name="active">
				<option value="0" <?= userActive( "0" , $adminUserUpdate->active)?>>Désactiver</option>
				<option value="1" <?= userActive( "1" , $adminUserUpdate->active)?>>Activer</option>
			</select>
		</div>

		<input type="submit" class="btn btn-primary daily-form" value="Modifier" name="admin-update-user">

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