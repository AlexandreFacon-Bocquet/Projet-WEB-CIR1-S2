<?php
    //vérifier que le mot de passe soit le même:
    function VerifMDP($string1, $string2){ //le string1=mdp et le string2=vérification du mdp et le test est le booléen
        $test=FALSE;
        if(preg_match($string1,$string2)==FALSE){
            $test=FALSE;
        }
        else{
            $test=TRUE;
        }
        return $test;
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
        /*
            A compléter pour vérifier et pull la commande SQL (le pattern est dans ConnectDB.php)
        */
        header("Location:menu.php");
    }



    function SubmitAcceptConnect(){ //pour accepter que si les champs sont requis de connexion
        
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

    function SubmitAcceptCreate(){ //pour accepter que si les champs sont requis de création
        
        if(isset($_POST['submit'])){
            // déclaration des variables
            $userErr = $mailErr = $mdpErr = "";
            $user = $mail = $mdp = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                
                //Champs obligatoires
                //nom
                if (empty($_POST["nom"])) {
                    $userErr = "* Le nom est requis";
                }
                else {
                    $user = test_input($_POST["nom"]);
                }
                //prenom
                if (empty($_POST["prenom"])) {
                    $userErr = "* Le prenom est requis";
                }
                else {
                    $user = test_input($_POST["prenom"]);
                }
                //genre
                if (empty($_POST["sexe"])) {
                    $userErr = "* Le genre est requis";
                }
                else {
                    $user = test_input($_POST["sexe"]);
                }
                //pseudo
                if (empty($_POST["nom_profil"])) {
                    $userErr = "* Le nom d'utilisateur est requis";
                }
                else {
                    $user = test_input($_POST["nom_profil"]);
                }
                //pp et bio pas obligatoire
                // if (empty($_POST["pp"])) {
                //     $userErr = "* Le nom est requis";
                // }
                // else {
                //     $user = test_input($_POST["name"]);
                // }
                // if (empty($_POST["bio"])) {
                //     $userErr = "* Le nom est requis";
                // }
                // else {
                //     $user = test_input($_POST["name"]);
                // }

                //mail
                if (empty($_POST["mail"])) {
                    $mailErr = "* L'adresse mail est requise";
                }
                else {
                    $mail = test_input($_POST["mail"]);
                    
                }
                //mdp
                if (empty($_POST["password"])) {
                    $mdpErr = "* Un mot de passe est requis";
                }
                else {
                    $mdp = test_input($_POST["password"]); 
                }
                //verif mdp
                if (empty($_POST["vpassword"])) {
                    $mdpErr = "* Une vérification du mot de passe est requise";
                }
                else {
                    $mdp = test_input($_POST["vpassword"]); 
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