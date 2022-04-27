<!DOCTYPE html>
<html>
<body>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="menu_deroulant.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="connexion.css" media="screen" type="text/css" />

    </head>
    
    <body background="images/2-14.jpg.webp" bgproperties="fixed">
        <div class="back"></div>
        <nav class="menuD"> 
            <a href="menu.php">Profil</a>
            <a href="add.php">Add new pic</a>
            <a href="deconnexion.php">Déconnexion</a>
        </nav>
        <div id="container">
            <form action="verification.php" method="POST">
                <h1>Connexion</h1>

                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="nom_profil" id="username" name="username" required>

                <label><b>Email</b></label>
                <input type="mail" placeholder="instogram@email.com" id="mail" name="mail" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="votre_mot_de_passe" id="password" name="password" required>

                <a href="#" class="forgotMDP">Mot de passe oublié ?</a>

                <!--Il faut set le cookie-->
                <input type="checkbox" value="souvenir" name="souvenir">
                <label for="souvenir">Se souvenir de moi</label>

                <input type="submit" id='submit' value='LOGIN'>

                <p class="inscription">Pas encore inscrit ? <a href="create.php">Créer un compte</a></p>
            </form>
                <?php
                // connexion à la DB
                    include("ConnectDB.php");
                    $requete_connect="SELECT email_profil, mdp_profil, pseudo_profil FROM users";
                    $result_connect=mysqli_query($connexion, $requete_connect);

                    if($result_connect==FALSE){
                        echo "erreur execution de requete";
                        die();
                    }
                // S'il y'a une erreur de remplissage :
                    include("functions.php");
                    SubmitAcceptConnect();

                    $trouve=TRUE;
                    if(mysqli_num_rows($result_connect)>0){
                        while($row=mysqli_fetch_assoc($result_connect)){
                            if(preg_match($_POST["username"],$row['pseudo_profil'])==TRUE){
                                if(preg_match($_POST["mail"],$row['email_profil'])==TRUE){
                                    if(VerifMDP($_POST["password"],$row['mdp_profil'])){
                                        header("Location:menu.php");
                                    }
                                    else $trouve=FALSE;
                                }
                                else $trouve=FALSE;
                            }
                            else $trouve=FALSE;
                        }
                        if($trouve==FALSE){
                            echo "Mauvais Identifiant ou mot de passe";
                            mysqli_close($connexion);
                        }
                    }
                    //setcookie()
                ?>
            
        </div>
        
    </body>

</body>
</html>