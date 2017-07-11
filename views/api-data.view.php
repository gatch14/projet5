<?php $title = "Public API"; ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Christophe Gatelet">
    <meta name="description" content="Controler votre santé avec le journal de bord">

    <title>
      <?php
        echo isset($title)
          ? $title
          : 'Journal de bord M-A-I';
      ?>
    </title>
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
  
  <!-- include the calendar js and css files -->
  <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

    <!--banner-->
    <section id="<?= idBanner() ?>" class="banner">
      <div class="bg-color<?= bgColor() ?>">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="col-md-12">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbarResponsive">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Journal M-A-I</a>
              </div>

           <!-- fin menu responsive-->

          </div>
        </div>
      </nav> 
      <!--/ banner-->
      </div>
      </section>

<div id="main-content">

    <div class="container">
		
	  <h1>Public API</h1>

	<p>Pour utiliser notre API utilisez l'URL <a href="<?= SITE_URL ?>api-data-url "><?= SITE_URL ?>api-data-url</a></p>

    </div><!-- /.container -->

</div>


<?php include('partials/footer.php'); ?>