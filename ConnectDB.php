<?php 
	$nameDB="ProjetWeb"; //Instogram pour Isaure et ProjetWeb pour Alex
	$connexion = mysqli_connect("localhost","root","root",$nameDB);

	if(!$connexion){
		echo"<p>Erreur de connexion".mysqli_connect_error()."</p>";
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
