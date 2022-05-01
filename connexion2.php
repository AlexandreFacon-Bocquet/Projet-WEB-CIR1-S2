<?php
    // connexion à la DB
    include("ConnectDB.php");
    $requete_connect="SELECT * FROM users";
    $result_connect=mysqli_query($connexion, $requete_connect);

    if($result_connect==FALSE){
        echo "erreur execution de requete";
        die();
    }
                    // S'il y'a une erreur de remplissage :
                include("functions.php");
                $test=TRUE;
                $test=SubmitAcceptConnect($test);
                echo "<p>etape 2</p>";
                echo  var_dump($test);
                if($test==TRUE){
                    echo "<p>etape3</p>";
                    $login_name=$_POST["username"];
                    $login_mdp=$_POST["password"];
                    $login_mail=$_POST["mail"];
                    echo "<p>etape4</p>";

                    $trouve=TRUE;
                    if(mysqli_num_rows($result_connect)>0){
                        echo "<p>etape5</p>";
                        while($row=mysqli_fetch_assoc($result_connect) AND $trouve!=False){
                            echo "<p>etape6</p>";
                            if(strcmp($login_name,$row['pseudo_profil'])==TRUE){
                                echo "<p>etape7</p>";
                                if(strcmp($login_mail,$row['email_profil'])==TRUE){
                                    echo "<p>etape8</p>";
                                    if(VerifMDP($login_mdp,$row['mdp_profil'])){
                                        $_SESSION['pseudo_profil']=$row['pseudo_profil'];
                                        $_SESSION['email_profil']=$row['email_profil'];
                                        $_SESSION['mdp_profil']=$row['mdp_profil'];
                                        $_SESSION['id']=$row['id'];
                                        $_SESSION['prenom_user']=$row['prenom_user'];
                                        $_SESSION['prenom_user']=$row['prenom_user'];
                                        $_SESSION['nom_user']=$row['nom_user'];
                                        $_SESSION['gender_user']=$row['gender_user'];
                                        $_SESSION['bio_user']=$row['bio_user'];
                                        $_SESSION['submitConnect']=$_POST['submitConnect'];
                                        echo "coucou";

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
                }

                
                    
                    //setcookie()
                ?>