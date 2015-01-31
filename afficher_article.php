<?php
	include('includes/connexion.inc.php');	//inclusion de la page de connexion a la BDD
	include('includes/haut.inc.php');	//inclusion du haut de la page
	include('verif_connexion.php');	//inclusion de la page verif_connexion.php
	include('includes/notifications.inc.php'); //inclusion de la page de notification
	
	if(isset($_GET['id'])) {
		$id=(int)$_GET['id'];
		$sql= "SELECT * FROM articles WHERE id=$id";	//requête pour afficher l'article en fonction de l'id
		$req =mysql_query($sql);
		if($data = mysql_fetch_array($req)){
			?><h1><?php echo $data['titre']."<br><br>";?></h1>
			<?php $data['texte'] = htmlspecialchars($data['texte']);
			echo nl2br($data['texte']);
		}
	}
   	include('includes/bas.inc.php');	//inclusion du bas de la page
?>
