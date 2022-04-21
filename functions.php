<?php
    //vérifier que le mot de passe soit le même:
    function VerifMDP($string1, $string2,$test){ //le string1=mdp et le string2=vérification du mdp et le test est le booléen
        if(preg_match($string1,$string2)==FALSE){
            $test=FALSE;
        }
        else{
            $test=TRUE;
        }
    }

    //vérifier que le mdp soit conforme:
    function ValidMDP($string, $test){ //le string est le mdp et le test est une variable booléenne qui valid ou non le mdp
        $test = TRUE;
        if(strlen($string) < 8){
            $test = FALSE;
        }
        elseif(preg_match( "/[0-9]+/" , $string) == FALSE){
            $test=FALSE;
        }
        elseif(preg_match( "/[a-z]+/" , $string) == FALSE){
            $test=FALSE;
        }
        elseif(preg_match( "/[A-Z]+/" , $string) == FALSE){
            $test=FALSE;
        }
    }

    //vérifier si c'est bien un email qui est entré :
    function ValidMAIL($string, $bool){ // le string est l'email et le bool est la variable booléenne pour la validation
        $pattern= "/^[a-zA-Z.-]+@[a-zA-Z.]+(.)[a-z]$/";
        if(preg_match($pattern, $string)==true){
            $bool=TRUE;
        }
        else{
            $bool=FALSE;
        }
    }

    function VerifConnect(){ //procedure de verification du mdp et du user grace à l'email lors de la connexion

    }



    function SubmitAccept(){ //pour accepter que si les champs sont requis

        if(isset($_POST['submit'])){
            // déclaration des variables
            $userErr = $mailErr = $mdpErr = "";
            $user = $mail = $mdp = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                //Champs obligatoires
                if (empty($_POST["name"])) {
                    $userErr = "* Le nom est requis";
                }
                else {
                    $user = test_input($_POST["name"]);
                }
            

                if (empty($_POST["mail"])) {
                    $mailErr = "* L'adresse mail est requise";
                }
            
                else {
                    $mail = test_input($_POST["mail"]);
                    
                }
                
                if (empty($_POST["mdp"])) {
                    $mdpErr = "* Un mot de passe est requis";
                }
            
                else {
                    $mdp = test_input($_POST["mdp"]);
                    
                }
            }
        }
    
    }

    function UserNameExist(){ //pour le formulaire de création de compte
        $select = mysqli_query($conn, "SELECT * FROM users WHERE username = '".$_POST['username']."'");
        
        if(mysqli_num_rows($select)) {
            exit("Ce nom d'utilisateur existe déjà");
}
    }

?> 