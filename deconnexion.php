<!DOCTYPE html>
<html>
<body>
    <head>
       <meta charset="utf-8">
        <!-- importer le fichier de style -->
        <link rel="stylesheet" href="menu_deroulant.css" media="screen" type="text/css" />
        <link rel="stylesheet" href="connexion.css" media="screen" type="text/css" />

    </head>
    
    <body background="images/photoInte.jpg" bgproperties="fixed">
        <div class="back"></div>

        <div id="container">
           <form method="POST">
                   <h1>Déconnexion</h1>

                   <br>

                   <label><i><b>Êtes-vous sûr de vouloir vous déconnecter ?</b></i></label>

                   <br>
                   <br>

                   <input type="submit" id='submitConnect' name="submitConnect" value='Se Déconnecter'>

                  <i> <p  class="inscription"> Vous ne souhaitez pas vous déconnecter ? </i><br>
                   <a href="menu.php"> Retourner sur l'album photo</a></p>
               </form>
                
            <?php
                //mettre le code de deconnexion
                session_start();
                if(isset($_POST['submitConnect'])){
                    $choix = $_POST["choix"];
                    if($choix == "oui"){
                        session_unset();
                        session_destroy();
                        header("Location:connexion.php");
                    }
                }
                

            ?>
        </div>
        
    </body>
</html>

