<?php
session_start();
$nameDB="ProjetWeb"; //Instogram pour Isaure et ProjetWeb pour Alex
$connexion = mysqli_connect("localhost","root","root","ProjetWeb");

if(!$connexion){
    echo"<h1>Erreur de connexion".mysqli_connect_error()."</h1>";
    die();
}
require("functions.php");



if(isset($_POST['submit'])){
        //set up variables 
    $newname=$_POST['nom'];
    $newfname=$_POST['prenom'];
    $newgender=$_POST['sexe'];
    $newusername=$_POST['username'];
    $newmail=$_POST['mail'];
    $newmdp=$_POST['mdp'];
    $verifmdp=$_POST['vpassword'];


    //verification 
    if(isset($newname) && isset($newfname) && isset($newgender)){
        if(isset($newusername)){
            if(mysqli_num_rows(mysqli_query($connexion,"SELECT * FROM users WHERE pseudo='$newusername'"))==1){//on vérifie que ce pseudo n'est pas déjà utilisé par un autre membre
                echo "<p> Ce pseudo est déjà utilisé <p>";
            }
            else{
                if(isset($newmail)){
                    if(ValidMAIL($newmail)){
                        if(isset($newmdp)){
                            if(ValidMDP($newmdp)){
                                if(isset($verifmdp)){
                                    if(VerifMDP($newmdp,$verifmdp)){
                                        //enfin bon, tout est traversé, il faut maintenant faire la connexion avec la DB
                                        $requete_tempo= "INSERT INTO `users`(`pseudo_profil`, `email_profil`, `mdp_profil`, `nom_user`, `prenom_user`, `gender_user`) VALUES ('$newusername','$newmail','$newmdp','$newname','$newfname','$newgender')";
                                        if(!mysqli_query($connexion,$requete_tempo)){//on crypte le mot de passe avec la fonction propre à PHP: md5()
                                            echo "Une erresur s'est produite: ".mysqli_error($connexion);//je conseille de ne pas afficher les erreurs aux visiteurs mais de l'enregistrer dans un fichier log
                                        } else {
                                            echo "Vous êtes inscrit avec succès!";
                                            //on affiche plus le formulaire
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

    echo '<a href="create.php"> Retour à la création de votre compte </a>';
    
}
?>