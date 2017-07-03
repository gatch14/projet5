<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Christophe Gatelet">

    <title>
      <?php
        echo isset($title)
          ? $title
          : 'Quelque bout de code préparé';
      ?>
    </title>

    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="libraries/uploadify/uploadify.css">
  
  <!-- include the calendar js and css files -->
  <link rel="stylesheet" type="text/css" href="assets/css/zabuto_calendar.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

<?php include('partials/nav.php'); ?>
<?php include('partials/flash.php'); ?>