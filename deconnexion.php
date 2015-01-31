<?php
	include('includes/notifications.inc.php'); //inclusion de la page de notification
	setcookie("sid",$sid,time()-1);
	session_unset ();
	session_destroy ();
	$_SESSION['connexion'] = 'deconnexion';
	header("location: index.php?p=1");	//redirection vers l'index
?>