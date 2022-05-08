<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h2>Êtes-vous certain de vouloir supprimer ce post ? </h2>

    <?php
        //connexion sql pour afficher la photo
        $receive=$_GET["id"];
        require("ConnectDB.php");
        $requete="SELECT * FROM picture WHERE pic_id=$receive";
        $result=mysqli_query($connexion,$requete);

        while($tab=mysqli_fetch_assoc($result)){
            $type=$tab['pic_type'];
    ?>

    <img src="<?php echo 'posts/'.$receive.'.'.$type?>" style="width:230px;height:230px;position:relative;right:0px;">

    <button><a href=<?php echo "deleted.php?id=$receive";?>> OUI </a></button>
    <button><a href="menu.php"> NON </a></button>
    <?php } ?>

</body>
</html>