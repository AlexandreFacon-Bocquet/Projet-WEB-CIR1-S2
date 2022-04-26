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
            <a href="menu.html">Profil</a>
            <a href="add.html">Add new pic</a>
            <a href="deconnexion.php">Déconnexion</a>
        </nav>
        <div id="container">
            <form action="verification.php" method="POST">
                <h1>Connexion</h1>

                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="nom_profil" name="username" required>

                <label><b>Email</b></label>
                <input type="mail" placeholder="instogram@email.com" name="mail" required>

                <label><b>Mot de passe</b></label>
                <input type="password" placeholder="votre_mot_de_passe" name="password" required>

                <a href="#" class="forgotMDP">Mot de passe oublié ?</a>

                <!--Il faut set le cookie-->
                <input type="checkbox" value="souvenir" name="souvenir">
                <label for="souvenir">Se souvenir de moi</label>

                <input type="submit" id='submit' value='LOGIN'>

                <p class="inscription">Pas encore inscrit ? <a href="create.html">Créer un compte</a></p>
                <?php
                    if(isset($_GET['erreur'])){
                        $err = $_GET['erreur'];
                        if($err==1 || $err==2)
                            echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                    }

                    setcookie()
                ?>
            </form>
        </div>
        
    </body>

</body>
</html>