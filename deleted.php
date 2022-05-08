<?php 
    //récupération de l'ID par l'URL
    $receive=$_GET["id"];

    //connexion à la base de donnée
    require("ConnectDB.php");

    //première requête permettant de récupérer les informations de la photo pour la supprimer DU FICHIER
    $requete1="SELECT * FROM picture";
    $result1=mysqli_query($connexion, $requete1);
    if(!$result1){
        echo"problème d'execution de requête";
        die();
    }
    while($sup=mysqli_fetch_assoc($result1)){
        $type=$sup['pic_type'];
    }
    /** suppresion du fichier *****************/
    /**/$file='posts/'.$receive.'.'.$type;  /**/
    /**/if(file_exists($file)){             /**/
    /**/    unlink($file);                  /**/
    /**/}                                   /**/
    /******************************************/

    //deuxioème requête permettant de supprimer les informations de l'image DANS LA BASE DE DONNÉES
    $requete2="DELETE FROM picture WHERE pic_id=$receive";
    $result2=mysqli_query($connexion, $requete2);
    if(!$result2){
        echo"problème d'execution de requête";
        die();
    }

    //Quand tout estfini, retour à la page principale
    header("Location:menu.php");
    
?>