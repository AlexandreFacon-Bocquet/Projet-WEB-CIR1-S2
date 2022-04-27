<!DOCTYPE html>
<html>
<body>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="menu_deroulant.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="create.css" media="screen" type="text/css" />

    </head>
    
    <body background="images/2-14.jpg.webp" bgproperties="fixed">
        <div class="back"></div>
        <nav class="menuD"> 
            <a href="menu.html">Profil</a>
            <a href="add.html">Add new pic</a>
            <a href="connexion.html">Connexion</a>
        </nav>
        <div id="container">
            <form action="create.php" method="POST">
                <h1>Création de compte</h1>

                <section id="personal">
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
                </section>
                
                <section id="compte">
                    <label><b>Nom d'utilisateur</b></label>
                    <input type="text" placeholder="nom_profil" name="username" required>

                    <label><b>Photo de profil</b></label><br>
                    <input type="file" name="pp">
    
                    <label><b>Biographie du profil</b></label>
                    <textarea name="bio" placeholder="Décris toi en queqlques mots ;)"></textarea>
                </section>
                
               <section id="gestion">
                    <label><b>Email</b></label><br>
                    <input type="mail" placeholder="instogram@email.com" name="mail" class="mail" required><br>

                    <label><b>Mot de passe</b></label>
                    <p>Le mot de passe doit contenir au minimum: 8 caractères, 1 chiffre, 1 majuscule</p>
                    <input type="password" placeholder="votre_mot_de_passe" name="password" class="password" required>

                    <label><b>Vérification du mot de passe</b></label>
                    <input type="text" placeholder="votre_mot_de_passe" name="vpassword" class="vpassword" required>


                    <input type="submit" id='submit' value='INSCRIPTION' >
               </section>
                
            </form>
                <?php
                // S'il y'a une erreur de remplissage :
                    include("functions.php");
                    SubmitAcceptCreate();
                // connexion à la DB
                    include("ConnectDB.php");
                    $requete_create="INSERT INTO users VALUES (NULL, '$_POST['pseudo_profil']','$_POST['email_profil']','$_POST['mdp_profil']','$_POST['nom_user']','$_POST['prenom_user']','$_POST['gender_user']','$_POST['bio_user']'";
                    $result_create=mysqli_query($connexion, $requete_connect);

                    if($result_connect==FALSE){
                        echo "erreur execution de requete";
                        die();
                    }
                    else header("Location:menu.php");
                ?>
        </div>
        
    </body>

</body>
</html>