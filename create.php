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
    
    <body background="images/2-14.jpg.webp" bgproperties="fixed">
        <div class="back"></div>
        <nav class="menuD"> 
            <a href="menu.php">Profil</a>
            <a href="add.php">Add new pic</a>
            <a href="connexion.php">Connexion</a>
        </nav>
        <div id="container">
            
                <?php
                    $nameDB="ProjetWeb"; //Instogram pour Isaure et ProjetWeb pour Alex
                    $connexion = mysqli_connect("localhost","root","root","ProjetWeb");
                
                    if(!$connexion){
                        echo"<h1>Erreur de connexion".mysqli_connect_error()."</h1>";
                        die();
                    }
                    require("function.php");
                    $affichageformulaire=1;
                    if(isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['genre'])){
                        if(isset($_POST['username'])){
                            if(mysqli_num_rows(mysqli_query($connexion,"SELECT * FROM users WHERE pseudo='".$_POST['pseudo_profil']."'"))==1){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
                                echo "<p> Ce pseudo est déjà utilisé <p>";
                            }
                            else{
                                if(isset($_POST['mail'])){
                                    if(ValidMAIL($_POST['mail'])){
                                        if(isset($_POST['mdp'])){
                                            if(validMDP($_POST['mdp'])){
                                                if(isset($_POST['vpassword'])){
                                                    if(VerifMDP($_POST['mdp'],$_POST['vpassword'])){
                                                        //enfin bon, tout est traversé, il faut maintenant faire la connexion avec la DB
                                                        $requete_tempo= "INSERT INTO users SET id='NULL', pseudo_profil='$_POST['username']', email_profil = '$_POST['mail']', mdp_profil='$_POST['mdp']' ";
                                                        if(!mysqli_query($connexion,$requete_tempo)){//on crypte le mot de passe avec la fonction propre à PHP: md5()
                                                            echo "Une erresur s'est produite: ".mysqli_error($connexion);//je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
                                                        } else {
                                                            echo "Vous êtes inscrit avec succès!";
                                                            //on affiche plus le formulaire
                                                            $AfficherFormulaire=0;
                                                            $_SESSION['pseudo']=$_POST['username'];
                                                            header("Location:menu.php");
                                                        }
                                                    }
                                                    else echo "Mot de passe non confirmé";
                                                }
                                                else echo" Veuillez confirmer votre mot de passe";
                                            }
                                            else echo "<p> Mot de passe invalide <p>";
                                        }
                                        else echo "<p> Vous devez créer un mot de passe <p>";
                                    }
                                    else echo "<p> Email invalide </p>";
                                }
                                else echo "<p> Vous devez entrer votre mail </p>";
                            }
                        }
                        else echo "<p> Vous devez créer un pseudo </p>";
                    }
                    else echo "<p> Il manque au moins une donnée personnelle</p>";
                    
                    if($AfficherFormulaire==1){
                        ?>
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
                    <input type="password" placeholder="votre_mot_de_passe" name="mdp" class="mdp" required>

                    <label><b>Vérification du mot de passe</b></label>
                    <input type="text" placeholder="votre_mot_de_passe" name="vpassword" class="vpassword" required>


                    <input type="submit" id='submit' value='INSCRIPTION' >
               </section>
                
            </form>

                        <?php
                    }
                ?>
        </div>
        
    </body>

</body>
</html>