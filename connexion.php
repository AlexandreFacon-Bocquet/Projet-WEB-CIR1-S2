<!DOCTYPE html>
<html>
<body>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="menu_deroulant.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="connexion.css" media="screen" type="text/css" />

    </head>
    
    <body background="images/photoInte.jpg" bgproperties="fixed">
        <div class="back"></div>
        <div id="container">
            
            <!-- Formulaire de connexion -->
            <form action="connexionBIS.php" method="POST">  <!-- ConnexionBis.php : page de formulaire associée -->
                <h1>Connexion</h1>

                <label><b>Nom d'utilisateur</b></label>
                
                <?php 
                    if(isset($_COOKIE['username'])){ 
                        $var=$_COOKIE['username'];
                ?>

                <input type="text" value="<?php echo $var;?>" id="username" name="username" required>
                
                <?php
                    }
                    else{
                ?>

                <input type="text" placeholder="nom_profil" id="username" name="username" required>
               
                <?php } ?>


                <label><b>Email</b></label>
                
                <?php 
                    if(isset($_COOKIE['mail'])){ 
                        $var=$_COOKIE['mail'];
                ?>

                <input type="mail" value="<?php echo $var?>" id="mail" name="mail" required>
                
                <?php
                    }
                    else{
                ?>

                <input type="mail" placeholder="instogram@email.com" id="mail" name="mail" required>
                
                <?php } ?>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="votre_mot_de_passe" id="password" name="password" required>

                <a href="#" class="forgotMDP">Mot de passe oublié ?</a>
                <input type="checkbox" value="souvenir" name="souvenir">
                <label for="souvenir">Se souvenir de moi</label>


                <input type="submit" id='submitConnect' name="submitConnect" value='LOGIN'>

                <p class="inscription">Pas encore inscrit ? <a href="create.php">Créer un compte</a></p>

            </form>
        </div>
    </body>
</body>
</html>