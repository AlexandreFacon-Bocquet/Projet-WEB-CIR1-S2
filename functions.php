<?php
    //vérifier que le mot de passe soit le même:
    function VerifMDP($string1, $string2){ //le string1=mdp et le string2=vérification du mdp et le test est le booléen
        $test=FALSE;
        if(strcmp($string1,$string2)!=0){
            $test=FALSE;
        }
        else{
            $test=TRUE;
        }
        return $test;
    }

    //vérifier que le mdp soit conforme:
    function ValidMDP($string){ //le string est le mdp et le test est une variable booléenne qui valide ou non le mdp
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
        return $test;
    }

    //vérifier si c'est bien un email qui est entré :
    function ValidMAIL($string){ // le string est l'email et le bool est la variable booléenne pour la validation
        $bool=TRUE;
        $pattern= "/^[a-zA-Z.-]+@[a-zA-Z.]+(.)[a-z]$/";
        if(preg_match($pattern, $string)){
            $bool=TRUE;
        }
        else{
            $bool=FALSE;
        }
        return $bool;
    }

?> 