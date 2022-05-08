<?php 
    $receive=$_GET["id"];
    require("ConnectDB.php");

    $requete1="SELECT * FROM picture";
    $result1=mysqli_query($connexion, $requete1);
    if(!$result1){
        echo"problème d'execution de requête";
        die();
    }
    while($sup=mysqli_fetch_assoc($result1)){
        $type=$sup['pic_type'];
    }
    $file='posts/'.$receive.'.'.$type;
    if(file_exists($file)){
        unlink($file);
    }
    $requete2="DELETE FROM picture WHERE pic_id=$receive";
    $result2=mysqli_query($connexion, $requete2);
    if(!$result2){
        echo"problème d'execution de requête";
        die();
    }
    header("Location:menu.php");
    
?>