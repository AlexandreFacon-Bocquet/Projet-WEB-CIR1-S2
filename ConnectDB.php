<?php 
	$nameDB="ProjetWeb"; //Instogram pour Isaure et ProjetWeb pour Alex
	$connexion = mysqli_connect("localhost","root","root","ProjetWeb");

	if(!$connexion){
		echo"<h1>Erreur de connexion".mysqli_connect_error()."</h1>";
		die();
	}
	
	/* format basique pour requete sql */
	/*

	$requete="";
	$result="";
	if($result==FALSE){
		echo "erreur execution de requete";
		die();
	}

	*/
?>
