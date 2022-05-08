<?php
    //récupération des données du formulaire
    $receive=$_POST['id'];
    $name=$_POST['picname'];
    $place=$_POST['picplace'];
    if(empty($_POST['piccomment'])) $comment="";
    else $comment=$_POST['piccomment'];
    $date=$_POST['picdate'];

    //connexion base de données
    require("ConnectDB.php");
    $requete="UPDATE `picture` SET `pic_name`='$name',`pic_date`='$date',`pic_comment`='$comment',`pic_place`='$place' WHERE `pic_id`=$receive ";
    $result=mysqli_query($connexion,$requete);
    if(!$result){
        echo "problème modification des données de la photo".mysqli_error($connexion);
        die();
    }

    //retour à la page principale lorsque la modification est effectuée
    header("Location:menu.php");
    
?>