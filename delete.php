<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="delete.css" media="screen" type="text/css" />

</head>
<body>
    <h2>Êtes-vous certain de vouloir supprimer ce post ? </h2>

    <?php
        //récupération de l'ID passé par l'addresse URL
        $receive=$_GET["id"];

        //connexion base de données
        require("ConnectDB.php");
        $requete="SELECT * FROM picture WHERE pic_id=$receive";
        $result=mysqli_query($connexion,$requete);

        while($tab=mysqli_fetch_assoc($result)){
            $type=$tab['pic_type'];
    ?>

    <!-- Affichage de l'image correspondante -->
    <img src="<?php echo 'posts/'.$receive.'.'.$type?>" style="width:230px;height:230px;position:relative;right:0px;">

    <!-- 2 boutton permettant de décider du sort de la photo -->
    <button class="bn" id="oui"><a href=<?php echo "deleted.php?id=$receive";?> class="bnspan" > OUI </a></button> <!-- deleted.php est la page de traitement de suppression de données -->
    <button class="bn" id="non"><a href="menu.php" class="bnspan" > NON </a></button>
    <?php } ?>

</body>
</html>