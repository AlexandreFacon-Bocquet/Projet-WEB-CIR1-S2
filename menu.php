<?php session_start();?>
<!DOCTYPE html>
<html>
<body>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="menu_deroulant.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="styleMenu.css" media="screen" type="text/css" />
        <!-- Pour les logos du glyphicon bootstrap : -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    </head>

    <body>
        <div class="back"></div>

        <!--menu déroulant-->
        <nav class="menuD"> 
            <a href="menu.php">Profil</a>
            <a href="add.php">Add new pic</a>
            <a href="deconnexion.php">Déconnexion</a>
        </nav>

        <?php 
            $nameDB="ProjetWeb"; //nom de la base de données
            $connexion = mysqli_connect("localhost","root","root","ProjetWEB");
            
            //on vérifie la connexion à la base de données
            if(!$connexion){
                echo"<p>Erreur de connexion".mysqli_connect_error()."</p>";
                die();
            }

            // on initialise les requêtes et leur résultat
            $requete_users="SELECT * FROM users";
            $requete_picture="SELECT * FROM picture";
            $result=mysqli_query($connexion, $requete_users);
            $result2=mysqli_query($connexion, $requete_picture);

            //on teste ses résultats
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
            <!-- Présentation du profil-->
            <div class="profile">

                <!-- Photo de profil-->
                <div class="profile-image">
                    <img src="images/promo67.png" alt="">
                </div>
                
                <!-- Nom du compte commun + mot d'accueil pour l'utilisateur connecté-->
                <div class="profile-presentation">
                    <h1 class="user_name">Promo 67</h1><br>
                    <h2> Bonjour <?php echo $essai; ?></h2><br>
                </div>

                <!-- Informations concernant le comte commun-->
                <div class="profile-info">
                    <ul>
                        <li><span class="user_info"><?php echo $nbreLignes; ?> Membres </span></li>
                        <li><span class="user_info"><?php echo $nbrePhotos; ?> Posts </span></li>
                    </ul>
                </div>

                <!-- Biographie du compte -->
                <div class="profile-custom">
                    <p class="bio"> 
                    Bienvenue sur la page Instogram de la promo 67 et plus précisement les CIR1 de ISEN Lille
                    </p>
                </div>
            </div>    	
        </header>

        
        <main>

            <!-- Publications sur compte commun -->
            <div class="gallery">

                <?php
                while ($tabPicture = mysqli_fetch_assoc($result2)) {
                ?>

                <div class="gallery-item" tabindex="0">

                    <?php 
                        echo '<img src="posts/'.$tabPicture['pic_id'].'.'.$tabPicture['pic_type'].'" class="gallery-image" alt="">';
                    ?>
                    
                    <div class="gallery-item-info">
                        <ul>
                            <!-- Affichage des images dans la galerie selon leur informations dans la base de données -->
                            <?php 
                                echo '<li class="title">'.$tabPicture['pic_name'].'</li><br>';
                                echo '<li class="galleryuser">'.$tabPicture['pic_user'].'</li><br><br>';
                                echo '<li class="comments">'.$tabPicture['pic_comment'].'</li><br><br>';
                                echo '<li class="gallerydata">'.$tabPicture['pic_date'].'    <br><br>    '.$tabPicture['pic_place'].'</li>';
                            ?>
                            
                        </ul>
                    </div>

                    <div class="gallery-control">
                    
                    <!-- l'utilisateur ne peut supprimer et/ou modifier uniquement ses publications-->
                    <?php 
                        if($tabPicture['pic_user']==$_SESSION['pseudo']){
                            $ID=$tabPicture["pic_id"];
                    ?>

                            <a href= <?php echo "delete.php?id=$ID";?>>
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                            <a href=<?php echo "modif.php?id=$ID";?>>
                                <span class="glyphicon glyphicon-cog"></span>
                            </a>

                    <?php
                        }
                    
                    ?>

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