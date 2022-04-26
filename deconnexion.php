<?php
    //mettre le code de deconnexion
    session_start();
    session_unset();
    session_destroy();
    mysqli_close($connexion);
    header('Location: connexion.html');
?>