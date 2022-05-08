<?php
    session_start();
    if(isset($_POST['submitConnect'])){ // s'il a eu eu envoie du formulaire

        //On vérifie que les 3 champs ne soient pas vide
        if(empty($_POST['username'])){
            echo "Le champ username est vide.";
        } else {
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
                    require("ConnectDB.php");

                    $requete_connect="SELECT * FROM users WHERE pseudo_profil='".$username."' AND mdp_profil='".$mdp."' AND email_profil='".$mail."'";
                    $result_connect=mysqli_query($connexion, $requete_connect);
                    if(mysqli_num_rows($result_connect)==0){
                        echo "<p>L'une des valeurs entrées est incorrecte</p>";
                        echo '<br> <a href="connexion.php"> Retour page de connexion </a>';
                    }
                    else{
                        //création d'une session pour enregistrer tout au long de la viste le pseudo qui nous sera utile
                        $_SESSION['pseudo'] = $username;

                        // mise en place des cookies pour se souvenir de la connexion si l'on a cliqué sur la checkbox "Se souvenir de moi"
                        if(isset($_POST['souvenir'])){
                            // set les cookies pour 2h
                            setcookie('username', $username, time()+(2*3600));
                            setcookie('mail', $mail, time()+(2*3600));
                        }

                        //redirection vers la page menu.php quand tout est fait
                        header("Location:menu.php");
                    }
                }
            }
        }
    }
?>