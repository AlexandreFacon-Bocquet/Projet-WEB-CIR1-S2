<?php
    session_start();
    if(isset($_POST['submitConnect'])){
        if(empty($_POST['username'])){
            echo "Le champ username est vide.";
        } else {
            // on vérifie maintenant si le champ "Mot de passe" n'est pas vide"
            if(empty($_POST['mail'])){
                echo "Le champ Mail est vide.";
            } else {
                if(empty($_POST['password'])){
                    echo "Le champ password est vide.";
                } else {
                    $username = htmlentities($_POST['username'], ENT_QUOTES, "UTF-8"); 
                    $mdp = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");
                    $mail = htmlentities($_POST['mail'], ENT_QUOTES, "UTF-8");

                    //connexion DB :
                    $nameDB="ProjetWeb"; //Instogram pour Isaure et ProjetWeb pour Alex
                    $connexion = mysqli_connect("localhost","root","root","ProjetWeb");

                    if(!$connexion){
                        echo"<h1>Erreur de connexion".mysqli_connect_error()."</h1>";
                        die();
                    }
                    $requete_connect="SELECT * FROM users WHERE pseudo_profil='".$username."' AND mdp_profil='".$mdp."' AND email_profil='".$mail."'";
                    $result_connect=mysqli_query($connexion, $requete_connect);
                    if(mysqli_num_rows($result_connect)==0){
                        echo "<p>L'une des valeurs entrées est incorrecte</p>";
                        echo '<br> <a href="connexion.php"> Retour page de connexion </a>';
                    }
                    else{
                        $_SESSION['pseudo'] = $username;
                        if(isset($_POST['souvenir'])){
                            // set les cookies pour 1h
                            setcookie('username', $username, time()+3600);
                            setcookie('mail', $mail, time()+3600);
                        }
                        header("Location:menu.php");
                    }
                }
            }
        }
    }
?>