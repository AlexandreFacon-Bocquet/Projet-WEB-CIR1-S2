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
            $connexion = mysqli_connect("localhost","root","root","ProjetWeb");
        
            if(!$connexion){
                echo"<p>Erreur de connexion".mysqli_connect_error()."</p>";
                die();
            }

            $requete_picture="SELECT * FROM users";
            $result=mysqli_query($connexion, $requete_picture);
            if($result==FALSE){
                echo "erreur execution de requete";
                die();
            }
            else{
                $nbreLignes=mysqli_num_rows($result);
            }

            if($nbreLignes>0){
                while($UneLigne = mysqli_fetch_assoc($result)){
                    $ID=$UneLigne["id"];
                    foreach($UneLigne as $key){
                        $pseudo= $key["pseudo_profil"];
                        $prenom = $key["prenom_user"];
                        $nom = $key["nom_user"];
                        $gender = $key["gender_user"];
                        $bio = $key["bio_profile"];
        ?> 
        <header>
            <div class="profile">
                <div class="profile-image">
                    <!-- mettre l'image en php ac sql -->
                    <img src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces" alt="">
                    
                </div>
                
                <div class="profile-presentation">
                    <!-- mettre les data en php ac sql -->
                    <h1 class="user_name"><?php echo $pseudo; ?></h1>
                    

                </div>
                <div class="profile-info">
                    <ul>
                        <li><span class="user_info"><?php echo $prenom; ?></span></li> <!--prenom -->
                        <li><span class="user_info"><?php echo $nom; ?></span></li> <!-- nom -->
                        <li><span class="user_info"><?php echo $gender; ?></span></li> <!-- sexe -->
                    </ul>
                </div>

                <div class="profile-custom">
                    <!-- mettre la bio en php ac sql -->
                    <p class="bio"> 
                    <?php echo $bio; ?>
                    </p>
                    <button class="button_newPics" href="add.php">Add a new pic !</button>
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
            <?php   
                    } 
                }
            }
            ?>
            	
        </header>
        <main>
            <div class="gallery">
                <!--
                    <?php 
                        // if(mysqli_num_rows($result)>0){
                        //     while($row=mysqli_fetch_assoc($result)){
                                
                        //     }
                        // }

                    ?>
                -->
                <div class="gallery-item" tabindex="0">
                    <img src="https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?w=500&h=500&fit=crop" class="gallery-image" alt="">
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes"><span class="visually-hidden">Likes:<?php echo $key['nom_profile'] ?></span><i class="fas fa-heart" aria-hidden="true"></i> 56</li>
                            <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 2</li>
                        </ul>
                    </div>
                </div>

                <div class="gallery-item" tabindex="0">
                    <img src="https://images.unsplash.com/photo-1497445462247-4330a224fdb1?w=500&h=500&fit=crop" class="gallery-image" alt="">
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 89</li>
                            <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 5</li>
                        </ul>
                    </div>
                </div>

                <div class="gallery-item" tabindex="0">
                    <img src="https://images.unsplash.com/photo-1426604966848-d7adac402bff?w=500&h=500&fit=crop" class="gallery-image" alt="">
                    <div class="gallery-item-type">
                        <span class="visually-hidden">Gallery</span><i class="fas fa-clone" aria-hidden="true"></i>
                    </div>
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 42</li>
                            <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 1</li>
                        </ul>
                    </div>
                </div>

                <div class="gallery-item" tabindex="0">
                    <img src="https://images.unsplash.com/photo-1502630859934-b3b41d18206c?w=500&h=500&fit=crop" class="gallery-image" alt="">
                    <div class="gallery-item-type">
                        <span class="visually-hidden">Video</span><i class="fas fa-video" aria-hidden="true"></i>
                    </div>
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 38</li>
                            <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 0</li>
                        </ul>
                    </div>
                </div>

                <div class="gallery-item" tabindex="0">
                    <img src="https://images.unsplash.com/photo-1498471731312-b6d2b8280c61?w=500&h=500&fit=crop" class="gallery-image" alt="">
                    <div class="gallery-item-type">
                        <span class="visually-hidden">Gallery</span><i class="fas fa-clone" aria-hidden="true"></i>
                    </div>
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 47</li>
                            <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 1</li>
                        </ul>
                    </div>
                </div>

                <div class="gallery-item" tabindex="0">
                    <img src="https://images.unsplash.com/photo-1515023115689-589c33041d3c?w=500&h=500&fit=crop" class="gallery-image" alt="">
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 94</li>
                            <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 3</li>
                        </ul>
                    </div>
                </div>

                <div class="gallery-item" tabindex="0">
                    <img src="https://images.unsplash.com/photo-1504214208698-ea1916a2195a?w=500&h=500&fit=crop" class="gallery-image" alt="">
                    <div class="gallery-item-type">
                        <span class="visually-hidden">Gallery</span><i class="fas fa-clone" aria-hidden="true"></i>
                    </div>
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 52</li>
                            <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 4</li>
                        </ul>
                    </div>
                </div>

                <div class="gallery-item" tabindex="0">
                    <img src="https://images.unsplash.com/photo-1515814472071-4d632dbc5d4a?w=500&h=500&fit=crop" class="gallery-image" alt="">
                    <div class="gallery-item-info">
                        <ul>
                            <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class="fas fa-heart" aria-hidden="true"></i> 66</li>
                            <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class="fas fa-comment" aria-hidden="true"></i> 2</li>
                        </ul>
                    </div>
                </div>

                
            </div>

            <div class="loader"></div>

        </main>
    </body>

</body>
</html>