<?php $title = "Page du compte"; ?>

<?php include('partials/header.php'); ?>

<?php if ($user->role == "roleUser"): ?>
	<div id="main-content">

	    <div class="container">
			
		  <h1>Bonjour <?= echap($user->pseudo) ?></h1>
		  <p>Role <?= echap($user->role) ?></p>
	    </div><!-- /.container -->

	</div>
<?php elseif ($user->role == "roleMedic"): ?>
	<div id="main-content">

	    <div class="container">
			
		  <h1>Bonjour <?= echap($user->pseudo) ?></h1>
		  <p>Role <?= echap($user->role) ?></p>
	    </div><!-- /.container -->

	</div>
<?php elseif  ($user->role == "roleAdmin"): ?>
	<div id="main-content">

	    <div class="container">
		  <h1>Administration</h1>
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