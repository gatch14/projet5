<?php $title = "Data api"; ?>

<?php include('partials/header.php'); ?>

<div id="main-content">

    <div class="container">
		
	  <h1>Data</h1>
<?php
echo json_encode($datas);
?>

    </div><!-- /.container -->

</div>


<?php include('partials/footer.php'); ?>