<?php
$croix = '<a href="#" id="croix" class="cacher_notif">&times</a>';
if(isset($_SESSION['article'])){
	switch ($_SESSION['article']) {
		case 'ajouter':
			echo "<div class='alert alert-success'>$croix Article ajouté avec succés ! </div>";
			$_SESSION['article'] = "";
			break;
		case 'modifier':
			echo  "<div class='alert alert-success'>$croix Article modifié avec succés ! </div>";
			$_SESSION['article'] = "";
			break;
		case 'erreur':
			echo  "<div class='alert alert-danger'>$croix Erreur, veuillez réessayer ! </div>";
			$_SESSION['article'] = "";
			break;
		case 'invalide':
			echo  "<div class='alert alert-danger'>$croix Titre ou texte manquant ! </div>";
			$_SESSION['article'] = "";
			break;
		case 'supprimer':
			echo  "<div class='alert alert-success'>$croix Article supprimé avec succés ! </div>";
			$_SESSION['article'] = "";
			break;
		default:
			# code...
			break;
	}
}

if(isset($_SESSION['connexion'])){
	switch ($_SESSION['connexion']) {
		case 'connecter':
			echo "<div class='alert alert-success'>$croix Connexion réussie ! </div>";
			$_SESSION['connexion'] = "";
			break;
		case 'deconnexion':
			echo "<div class='alert alert-success'>$croix Déconnexion réussie ! </div>";
			$_SESSION['connexion'] = "";
			break;
		case 'invalide':
			echo  "<div class='alert alert-error'>$croix Identifiant ou mot de passe incorrect ! </div>";
			$_SESSION['connexion'] = "";
			break;
		case 'err_champs':
			echo  "<div class='alert alert-danger'>$croix Veuillez remplir tout les champs !</div>";
			$_SESSION['connexion'] = "";
			break;
		case 'inscription':
			echo  "<div class='alert alert-success'>$croix Inscription réussie !</div>";
			$_SESSION['connexion'] = "";
			break;
		case 'err_mdp':
			echo  "<div class='alert alert-danger'>$croix Les mots de passe sont différents veuillez recommencer !</div>";
			$_SESSION['connexion'] = "";
			break;
		case 'erreur':
			echo  "<div class='alert alert-danger'>$croix Erreur 404 !</div>";
			$_SESSION['connexion'] = "";
			break;
		default:
			# code...
			break;
	}
}

?>