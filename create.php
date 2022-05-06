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
            <a href="menu.php">Profil</a>
            <a href="add.php">Add new pic</a>
            <a href="connexion.php">Connexion</a>
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
                    $nameDB="ProjetWeb"; //Instogram pour Isaure et ProjetWeb pour Alex
                    $connexion = mysqli_connect("localhost","root","root","ProjetWeb");
                
                    if(!$connexion){
                        echo"<h1>Erreur de connexion".mysqli_connect_error()."</h1>";
                        die();
                    }
                    include("function.php");
                    $affichageformulaire=1;
                    if(isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['genre'])){
                        if(isset($_POST['username'])){
                            if(isset($_POST['password'])){
                                echo"yo";
                                //if(ValidMDP($_POST['password']);
                            }
                        }
                        else echo "<p> Vous devez créer un pseudo </p>";
                    }
                    else echo "<p> Il manque au moins une donnée personnelle</p>";
                    






                
                ?>
        </div>
        
    </body>

</body>
</html>