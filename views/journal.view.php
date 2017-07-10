<?php $title = "Votre journal de bord"; ?>

<?php include('partials/header.php'); ?>
<?php include('partials/errors.php'); ?>

<?php if ( $user->role == "roleUser" Or $medicRole->role == "roleMedic"): ?>
<div id="main-content">

    <div class="container journal">
		
		<h1 class="text-center">Journal de bord</h1>

		  
		<!-- define the calendar element -->
		<div id="my-calendar" class="col-xs-12  col-md-6"></div>
		
		<!-- define the graph element 7days-->
		<div class="chart-container col-sm-12">
			<div class="chart7">
				<p class="titleGraph text-center">Les 7 derniers jours</p>
			    <canvas id="myChart7"></canvas>
			</div>
		</div>

		<!-- define the graph element 30 days-->
		<div class="chart-container30 col-md-offset-3 col-md-6 col-sm-12">
			<p class="titleGraph text-center">Les 30 derniers jours</p>
		    <canvas id="myChart30"></canvas>
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