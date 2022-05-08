<?php 
	$nameDB="ProjetWeb"; //Nom de la base de données
	$connexion = mysqli_connect("localhost","root","root","ProjetWeb");

	if(!$connexion){
		echo"<h1>Erreur de connexion".mysqli_connect_error()."</h1>";
		die();
	}

?>
