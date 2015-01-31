<?php
	include('includes/connexion.inc.php');	//inclusion de la page de connexion a la BDD	
	
	if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email']) && isset($_POST['mdp']) && isset($_POST['conf_mdp'])){
		//recupère le nom et le sécurise
		$nom = $_POST['nom'];
		$nom = mysql_real_escape_string($nom);	//protege la requete SQL pour eviter l'injection de code autrement que du string
		//recupère le prénom et le sécurise
		$prenom = $_POST['prenom'];
		$prenom = mysql_real_escape_string($prenom);	//protege la requete SQL pour eviter l'injection de code autrement que du string
		//recupère l'email et le sécurise
		$email = $_POST['email'];
		$email = mysql_real_escape_string($email);	//protege la requete SQL pour eviter l'injection de code autrement que du string
		//recupere le mdp et le sécurise
		$mdp = $_POST['mdp'];
		$mdp = mysql_real_escape_string($mdp);	//protege la requete SQL pour eviter l'injection de code autrement que du string	
		//recupere le mdp de confirmation et le sécurise
		$conf_mdp = $_POST['conf_mdp'];
		$conf_mdp = mysql_real_escape_string($conf_mdp);	//protege la requete SQL pour eviter l'injection de code autrement que du string
		
		//si les champs ne sont pas vide ...
		if(($nom != null) && ($prenom != null) && ($email != null) && ($mdp != null) && ($conf_mdp != null)) {
			if($_POST['mdp'] == $_POST['conf_mdp']) {	//si les mots de passe correspondent ...
				$sql = "INSERT INTO utilisateurs VALUES ('','$nom', '$prenom', '$email', '$mdp','','')";
				mysql_query($sql);	//execute la requete
				$_SESSION['connexion'] = 'inscription';
				header("location: index.php?p=1");
			}else{
				//"Les mots de passe correspondent pas";
				$_SESSION['connexion'] = 'err_mdp';
				header("location: inscription.php");
			}
		}else{
			//"Identifiant incorrect";
			$_SESSION['connexion'] = 'err_champs';
			header("location: inscription.php");
		}
	}else{
		include('includes/haut.inc.php');	//inclusion du haut de la page
		include('includes/notifications.inc.php'); //inclusion de la page de notification
	?>
		<h2>Inscription</h2>
		
		<p>Veuillez remplir les champs :</p><br>
		
		<form action="inscription.php" method="post" id="form_inscription">

			<fieldset>
				<div class="clearfix">
					<label for="nom">Nom</label>
					<div class="input"><input id="nom" name="nom" size="30" type="text" value="" placeholder="Nom" /></div>
				</div>
				<div class="clearfix">
					<label for="prenom">Prénom</label>
					<div class="input"><input id="prenom" name="prenom" size="30" type="text" value="" placeholder="Prénom" /></div>
				</div>
				<div class="clearfix">
					<label for="email">Email</label>
					<div class="input"><input id="email" name="email" size="30" type="email" value="" placeholder="Email" /></div>
				</div>
				<div class="clearfix">
					<label for="mdp">Mot de passe</label>
					<div class="input"><input id="mdp" name="mdp" size="15" type="password" placeholder="Mot de passe"/></div>
				</div>
				<div class="clearfix">
					<label for="conf_mdp">Confirmation du mot de passe</label>
					<div class="input"><input id="conf_mdp" name="conf_mdp" size="15" type="password" placeholder="Confirmation du mot de passe"/></div>
				</div><br>				
				<div class=form-actions">
					<input class="btn btn-large btn-primary" id="submit" type="submit" value="S'enregistrer" />
				</div>
			</fieldset>
		</form>
	<?php
	}
	include('includes/bas.inc.php');	//inclusion du bas de la page	
?>