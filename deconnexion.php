<?php
    //mettre le code de deconnexion
    session_start();
    session_unset();
    session_destroy();
    header("Location:connexion.php");
    
?>