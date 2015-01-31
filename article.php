<?php
	include('includes/connexion.inc.php');	//Inclusion de la connexion a la bdd
	include('includes/haut.inc.php');	//Inclusion du haut de la page
	include('includes/notifications.inc.php'); //inclusion de la page de notification
	if($connecte) {
		if(isset($_POST['titre'])){
			// Ajout a la base de donnée :
			//recupère le titre et le sécurise
			$titre = $_POST['titre'];
			$titre = mysql_real_escape_string($titre);	//protege la requete SQL pour eviter l'injection de code autrement que du string
			//recupere le texte et le sécurise
			$texte = $_POST['texte'];
			$texte = mysql_real_escape_string($texte);	//protege la requete SQL pour eviter l'injection de code autrement que du string
			$user_id = $data['id'];
			
			if(($titre != "") && ($texte != "")) {
				if(isset($_POST['id'])&& $_POST['id']){	
					$id= $_POST['id'];		
					$sql = "UPDATE articles SET titre='$titre', texte='$texte' WHERE id='$id'";	//requete SQL pour mettre a jour les articles	
					$_SESSION['article'] = 'modifier';
				}else{
					$sql = "INSERT INTO articles VALUES ('','$titre','$texte',UNIX_TIMESTAMP(), '$user_id')";	//requete SQL pour inserer les articles
					$_SESSION['article'] = 'ajouter';
				}
				mysql_query($sql);	//execute la requete
				//redirection vers l'index
				header('location: index.php');
			}else{
				$_SESSION['article'] = 'invalide';
				//redirection vers article
				header('location: article.php');
			}
			
		}else{	
			if(isset($_GET['id'])){
				$id= (int)$_GET['id'];			
				$sql = "SELECT * FROM articles WHERE id = $id";	//requête pour afficher l'article en fonction de l'id
				$result = mysql_query($sql);
				$data =mysql_fetch_array($result);
				$titre = $data['titre'];
				$texte = $data['texte'];
				$nom_btn='Modifier';			
			}else{
				$titre='';
				$texte='';
				$id='';
				$nom_btn='Valider';
			}
			//Affichage du formulaire
			?>
			<form action="article.php" method="post">
				<div class="clearfix">
					<label for="titre">Titre</label>
					<div class="input"><input type="text" name="titre" id="titre" value="<?php echo $titre;?>"></div>
				</div>
				
				<div class="clearfix">
					<label for="texte">Texte</label>
					<div class="input"><textarea name="texte" id="texte"><?php echo $texte;?></textarea></div>
				</div>		
				
				<div class="form-actions">
					<input type="submit" value="<?php echo $nom_btn;?>" class="btn btn-large btn-primary">
				</div>
				<input type="hidden" name="id" value="<?php echo $id;?>">
			</form>
			<?php	
		}
	}else{
		echo "Veuillez vous connecter pour accéder a cette page !";
		header ("Refresh: 4;URL=connexion.php"); //redirection vers connexion.php après 4sec si on est pas connecté
	}
	include('includes/bas.inc.php');	//Inclusion du bas de la page
?>