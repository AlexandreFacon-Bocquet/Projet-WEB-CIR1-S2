<?php session_start();?>
<!DOCTYPE html>
<html>
<body>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="menu_deroulant.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="styleMenu.css" media="screen" type="text/css" />

    </head>
    <body>
        <div class="back"></div>

        <nav class="menuD"> 
            <a href="menu.php">Profil</a>
            <a href="add.php">Add new pic</a>
            <a href="deconnexion.php">Déconnexion</a>
        </nav>
        <?php 
            $nameDB="ProjetWeb"; //Instogram pour Isaure et ProjetWeb pour Alex
            $connexion = mysqli_connect("localhost","root","root","ProjetWEB");
        
            if(!$connexion){
                echo"<p>Erreur de connexion".mysqli_connect_error()."</p>";
                die();
            }
            $requete_users="SELECT * FROM users";
            $requete_picture="SELECT * FROM picture";
            $result=mysqli_query($connexion, $requete_users);
            $result2=mysqli_query($connexion, $requete_picture);

            if($result==FALSE){
                echo "erreur execution de requete (users)";
                
                die();
            }
            if($result2==FALSE){
                echo "erreur execution de requete (photo)";
            }


            $nbreLignes=mysqli_num_rows($result);
            $nbrePhotos=mysqli_num_rows($result2);

            $essai=$_SESSION['pseudo']; //il marche
        ?>
        <header>
            
            <div class="profile">
                <div class="profile-image">
                    <img src="images/promo67.png" alt="">
                </div>
                
                <div class="profile-presentation">
                    <h1 class="user_name">Promo 67</h1>
                    <h2> Bonjour <?php echo $essai; ?></h2><br>
                </div>

                <div class="profile-info">
                    <ul>
                        <li><span class="user_info"><?php echo $nbreLignes; ?> Membres </span></li>
                        <li><span class="user_info"><?php echo $nbrePhotos; ?> Posts </span></li>
                    </ul>
                </div>

                <div class="profile-custom">
                    <!-- mettre la bio en php ac sql -->
                    <p class="bio"> 
                    Bienvenue sur la page Instogram de la promo 67 et plus précisement les CIR1 de ISEN Lille
                    </p>
                </div>
            </div>
        
            <!-- animation contour
                <div class="bordure-anim">
                    <a href="#!">
                    <span></span>
                    <span></span>
                    </a>
                </div>
            -->
           
            	
        </header>

        <?php
            // $requete_users="SELECT * FROM users";
            // $requete_picture="SELECT * FROM picture";
            // $result=mysqli_query($connexion, $requete_users);
            // $result2=mysqli_query($connexion, $requete_picture);

            
            //$tabPicture = mysqli_fetch_assoc($result2);
        ?>
        
        <main>
            <div class="gallery">

                <?php

                while ($tabPicture = mysqli_fetch_assoc($result2)) {


                ?>
                <div class="gallery-item" tabindex="0">

                    <?php 
                        echo '<img src="posts/'.$tabPicture['pic_id'].'.jpg" class="gallery-image" alt="">';
                    ?>
                    
                    <div class="gallery-item-info">
                        <ul>
                            <?php 
                                echo '<li>'.$tabPicture['pic_name'].'</li><br>';
                                echo '<li class="galleryuser">'.$tabPicture['pic_user'].'</li><br><br>';
                                echo '<li>'.$tabPicture['pic_comment'].'</li><br><br>';
                                echo '<li class="gallerydata">'.$tabPicture['pic_date'].'        '.$tabPicture['pic_place'].'</li>';

                            ?>
                            <!-- <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 94</li>
                            <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 3</li> -->
                        </ul>
                    </div>
                </div>

                <?php 
                }
                ?>
                
            </div>
        </main>
    </body>

</body>
</html>