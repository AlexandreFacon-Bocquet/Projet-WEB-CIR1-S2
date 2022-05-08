<?php 
 	$nameDB="ProjetWEB"; //Nom de la base de données
 	$connexion = mysqli_connect("localhost","root","root","ProjetWEB");

	//on vérifie la connexion à la base de données
 	if(!$connexion){
 		echo"<h1>Erreur de connexion".mysqli_connect_error()."</h1>";
 		die();
 	}

 ?>