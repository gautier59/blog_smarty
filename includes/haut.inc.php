<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Mon blog</title>
		<meta name="description" content="Petit blog pour m'initier à PHP">
		<meta name="author" content="Jean-philippe Lannoy">

		<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<link href="assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/main.css" rel="stylesheet">
		<script type="text/javascript" src="assets/js/jquery.2.1.1.min.js"></script>
		<script type="text/javascript" src="assets/js/pageloader.js"></script>
	</head>

	<body>
		<?php 
			include('verif_connexion.php');	//inclusion de la page verif_connexion.php
			if($connecte) {	//si connecté on affiche le prénom et le nom
				$titre2 = "Bienvenue : " . $data['prenom'] . " " . $data['nom'];
			}else{
				$titre2 = "Veuillez vous connecter";
			}	
		?>
	
    <div class="container">
      <div class="content">      
        <div class="page-header well">
			<h1><a href="index.php?p=1">Mon Blog</a> <small>Pour m'initier à PHP</small></h1>
			<?php echo "<h4>". $titre2 ."</h4>"; ?>
        </div>       
        <div class="row">     
          <div class="span8">
