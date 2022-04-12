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
            <a href="#">Add new pic</a>
            <a href="connexion.html">Connexion</a>
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

                <input type="submit" id='submit' value='LOGIN' >
                <!-- <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
                ?> -->
            </form>
        </div>
        
    </body>

</body>
</html>