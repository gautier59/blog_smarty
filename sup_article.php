<?php
	include('includes/connexion.inc.php');	//inclusion de la page de connexion a la BDD
	$id= (int)$_GET['id'];
	$sql = "DELETE FROM articles WHERE id = $id";	//requete pour supprimer l'article en fonction de l'id
	mysql_query($sql);	//execution de la requete
	$_SESSION['article'] = 'supprimer';
	header('location: index.php?p=1');
?>