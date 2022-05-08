<!DOCTYPE html>
<html>
<body>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="menu_deroulant.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="add.css" media="screen" type="text/css" />

        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
        <!-- Menu déroulant  -->
        <nav class="menuD"> 
            <a href="menu.php">Profil</a>
            <a href="add.php">Add new pic</a>
            <a href="deconnexion.php">Déconnexion</a>
        </nav>

        <?php 
            // récupération de l'id passer par l'URL
            $receive=$_GET["id"];
        ?>

        <div class="container">

            <!-- Titre de la page -->
            <div class="title">
                <span>M</span>
                <span>O</span>
                <span>D</span>
                <span>I</span>
                <span>F</span>
                <span>Y</span>
            </div>

            <!-- Récupération des données dans la base pour préremplir le formulaire de modification -->
            <?php 
                //connexion à la base de données
                require("ConnectDB.php");
                $requete="SELECT * FROM picture WHERE pic_id=$receive";
                $result=mysqli_query($connexion,$requete);

                while($tab=mysqli_fetch_assoc($result)){
                    $name=$tab['pic_name'];
                    $place=$tab['pic_place'];
                    $comment=$tab['pic_comment'];
                    $date=$tab['pic_date'];
                    $type=$tab['pic_type'];
            ?>
            <br><br>
            
                <div class="row">
                    <!-- affichage de l'image pour se souvenir de quelle post on effectue les modifications -->
                    <div class="col-sm-6">
                        <img class="imagemodify" src="<?php echo 'posts/'.$receive.'.'.$type?>" style="width:230px;height:230px;position:relative;right:0px;">
                    </div>
        
                    <!-- Formulaire de modification ---------------------------------------------->
                    <div class ="col-sm-6">
                        <form method="POST" action="modify.php">
                            <!-- modify.php : page php associée -->
                            <label><b>Nom de la photo :</b></label>
                            <br>
                            <input type="text" value="<?php echo $name;?>" name="picname" >
                            <br>
                            <label><b>Lieu :</b></label>
                            <br>
                            <input type="text" value="<?php echo $place;?>" name="picplace" >
                            <br>
                            <label><b>Comments :</b> (sans apostophe/guillemets)</label>
                            <br>
                            <textarea name="piccomment"><?php echo $comment;?></textarea>
                            <br>
                            <label><b>Date de la photo :</b></label>
                            <br>
                            <input type="date" name="picdate" value="<?php echo $date;?>">  
                            <br>
                            <br>
                            <button class="bn"><input type="submit" value="submit" class="bnspan"></button>
                            <input type="hidden" value="<?php echo $receive;?>" name="id"> <!-- pour garder la valeur id -->
                        </form>
                    </div>
                </div>
                <br><br>
                <?php
                }
                ?>
        </div>
    </body>
</body>
</html>