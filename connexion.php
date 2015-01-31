<?php
	include('includes/connexion.inc.php');	//inclusion de la page de connexion a la BDD
	if(isset($_POST['email']) && isset($_POST['mdp'])){
		//recupère l'email et le sécurise
		$email = $_POST['email'];
		$email = mysql_real_escape_string($email);	//protege la requete SQL pour eviter l'injection de code autrement que du string
		//recupere le mdp et le sécurise
		$mdp = $_POST['mdp'];
		$mdp = mysql_real_escape_string($mdp);	//protege la requete SQL pour eviter l'injection de code autrement que du string		
		$sql = "SELECT * FROM utilisateurs";	//requete SQL pour recuperer tout les utilisateurs
		$result = mysql_query($sql);	//recupere le resultat de la requete
		while($data = mysql_fetch_array($result)) {
			if($email == $data['email']) {
				if($mdp == $data['mdp']) {
					$sid = md5($email.time());
					$expiration_sid = time()+1800;
					//requete pour mettre a jour le sid et l'expiration de l'utilsateur
					$sql = "UPDATE utilisateurs SET sid='$sid', expiration_sid='$expiration_sid' WHERE email='$email'";
					$result = mysql_query($sql);	//recupere le resultat de la requete
					setcookie("sid",$sid,time()+1800);
					$_SESSION['connexion'] = 'connecter';
					//redirection vers l'index
					header("location: index.php?p=1");
				}else{
					//"Mot de passe incorrect";
					$_SESSION['connexion'] = 'invalide';
					//redirection vers la page de connexion
					header("location: connexion.php");
				}
			}else{
				//"Identifiant incorrect";
				$_SESSION['connexion'] = 'invalide';
				//redirection vers la page de connexion
				header("location: connexion.php");
			}
		}	
	}else{	
		include('includes/haut.inc.php');	//inclusion du haut de la page
		include('includes/notifications.inc.php'); //inclusion de la page de notification
	?>
		<h2>Connexion</h2>
		
		<p>Saisissez les identifiants choisis lors de votre inscription</p><br>
		
		<form action="connexion.php" method="post" id="form_connexion">

			<fieldset>
				<div class="clearfix">
					<label for="email">Email</label>
					<div class="input"><input id="email" name="email" size="30" type="email" value="" placeholder="Email" /></div>
				</div>
				<div class="clearfix">
					<label for="mdp">Mot de passe</label>
					<div class="input"><input id="mdp" name="mdp" size="15" type="password" placeholder="Mot de passe"/></div>
				</div><br>					
				<div class=form-actions">
					<input class="btn btn-large btn-primary" id="submit" type="submit" value="Se connecter" />
				</div>
			</fieldset>
		</form>
	<?php
	}
	include('includes/bas.inc.php');	//inclusion du bas de la page	
?>