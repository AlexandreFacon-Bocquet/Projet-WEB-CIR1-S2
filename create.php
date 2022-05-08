<?php session_start(); ?>
<!DOCTYPE html>
<html>
<body>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="menu_deroulant.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="create.css" media="screen" type="text/css" />

    </head>
    
    <body background="images/photoInte.jpg" bgproperties="fixed">
        <div class="back"></div>
       
        <div id="container">
            <form action="creation.php" method="POST">
                <h1>Création de compte</h1>
                <label><b>Nom</b></label>
                <input type="text" placeholder="nom" name="nom" required>

                <label><b>Prénom</b></label>
                <input type="text" placeholder="prenom" name="prenom" required>
            
                <label><b>Genre</b></label>
                <select name="sexe" placeholder="Choisir un des genre" required>
                    <option value="undefined">Undefined</option>
                    <option value="femme">Femme</option>
                    <option value="homme">Homme</option>
                    <option value="nonbi">Non-Binaire</option>
                </select>
                <label><b>Nom d'utilisateur</b></label>
                <input type="text" placeholder="nom_profil" name="username" required>
                
               
                <label><b>Email</b></label><br>
                <input type="mail" placeholder="instogram@email.com" name="mail" class="mail" required><br>

                <label><b>Mot de passe</b></label>
                <p>Le mot de passe doit contenir au minimum: 8 caractères, 1 chiffre, 1 majuscule</p>
                <input type="password" placeholder="votre_mot_de_passe" name="mdp" class="mdp" required>

                <label><b>Vérification du mot de passe</b></label>
                <input type="password" placeholder="votre_mot_de_passe" name="vpassword" class="vpassword" required>


                <input type="submit" id='submit' name='submit' value='INSCRIPTION' >
                <br><br>
                <a href="connexion.php"> > Retour à la page de connexion < </a>
            </form>
        </div>
        
    </body>

</body>
</html>