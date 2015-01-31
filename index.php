<?php
	require_once('/usr/share/php/smarty3/Smarty.class.php'); // Ajoute la class de Smarty
	require_once('includes/connexion.inc.php');	//inclusion de la page de connexion a la BDD
	include('includes/haut.inc.php');	//inclusion du haut de la page
	include('verif_connexion.php');	//inclusion de la page verif_connexion.php
	include('includes/notifications.inc.php'); //inclusion de la page de notification
	
	$app = 3;	//nombre d'article par pages
	$sql = "SELECT COUNT(id) FROM articles";	//requete sql pour recuperer le nombre d'articles
	$result = mysql_query($sql);
	$data = mysql_fetch_row($result);
	$total = $data[0];	//nombre totale d'articles
	$nb_pages = ceil($total / $app);	//nombre de pages
	
	$p=(isset($_GET['p']) && $_GET['p'] && ($_GET['p'] > 0) && ($_GET['p'] <= $nb_pages)) ? $_GET['p']:1;	
	$debut= ($p-1) * $app;
	
	$sql = "SELECT *, art.id AS id_article FROM articles AS art INNER JOIN utilisateurs AS users ON art.user_id = users.id";	//requete SQL pour selectionner les articles
	if(isset($_GET['r'])){	//si c'est une recherche ...
		$recherche = mysql_real_escape_string($_GET['r']);	//protege la requete SQL pour eviter l'injection de code autrement que du string
		$sql.= " WHERE titre LIKE '%$recherche%' OR texte LIKE '%$recherche%' ORDER BY date DESC LIMIT $debut,$app";	//requete SQL pour le moteur de recherche
		$count = "SELECT COUNT(*) FROM articles WHERE titre LIKE '%$recherche%' OR texte LIKE '%$recherche%'";	//requete sql pour savoir le nombre d'articles correspondant à la recherche
		$result = mysql_query($count);
		$data = mysql_fetch_row($result);
		$total = $data[0];	//nombre totale d'article		
		$nb_pages = ceil($total / $app);	//nombre de pages	
		$titreDyn = "Recherche : " .$recherche;
	}else{
		$sql.= " ORDER BY date DESC LIMIT $debut,$app";
		$titreDyn = "Dernier article ajouté :";
	}
	$result = mysql_query($sql);	//affiche le resultat de la requete
	
	$index = new Smarty();
	$index->assign('titre_din',$titreDyn);	
	$all_data=array();
	
	while($data =mysql_fetch_array($result)){ // recupère l'ensemble des tables
		$all_data[] = $data;
		$index->assign('connecte',$connecte);			
	}	
	$index->assign('tab_articles',$all_data);
	$index->assign('page',$p);
	$index->assign('recherche',$recherche);
	$index->assign('nb_pages',$nb_pages);
	$index->display("templates/index.tpl");
	
   	include('includes/bas.inc.php');	//inclusion du bas de la page
?>
<script>
	// La page est prête
	$(document).ready(function() {
		$.pageLoader();
	});
</script>
<script>
	//script pour afficher l'article au complet
	$(function(){
		$(".afficher-article").click(function(){
			var id = $(this).attr('data-id');
			$.get("afficher_article.php?id="+id, function(data){
				$(".container").html(data);
			});
		});
	});
</script>

