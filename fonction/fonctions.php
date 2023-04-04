<?php

function connectionBDD(){
    $connect = mysqli_connect ("localhost","root","","monprojet");
    if (mysqli_connect_errno()) {
       echo "erreur" . mysqli_connect_error();
       exit();
    }
    return $connect;
 }

 function hachage(string $MotDePasse){
   return password_hash("$MotDePasse",PASSWORD_BCRYPT);
   
 }


function verif(string $MotDePasse,int $ID,mysqli $connect) {
    $requete=" SELECT email FROM `clients` WHERE `mot_de_passe`=? and`ID_clients`=?;";

      if ($requetePrepare = mysqli_prepare($connect, $requete)){
        // bind mes valeur avec les ?
        mysqli_stmt_bind_param($requetePrepare, "ss", $MotDePasse , $ID);
        // execution de la requete prepare
        mysqli_stmt_execute($requetePrepare);
        // association de la valeur de la colonne id_clients à la variable $id
        // $row['id_clients']
        mysqli_stmt_bind_result($requetePrepare, $email);
        // recuperation des valeurs
        mysqli_stmt_fetch($requetePrepare);

//    var_dump($email);
//    var_dump(isset($email));
   exit();
         return isset($email);
      }
   
      return false;
   
   }


    function connecter(){
        return isset($_SESSION["nom"]);
    }

    // permet de savoir si on est connecter en tant que client
    function connecter_client(){
        return isset ($_SESSION["type"]) && $_SESSION["type"] == "client";
    }

    // permet de savoir si on est connecter en tant que collaborateur
    function connecter_collaborateur(){
        return isset ($_SESSION["type"]) && $_SESSION["type"] == "collaborateur";
    }

    function verifPassword(mysqli $connect, string $saisie_email, string $saisie_MotDePasse, string $type){
        
        if($type == "client"){
            $requete= "SELECT ID_clients, mot_de_passe, nom FROM `clients` WHERE email=?";
        }
          
        else if($type == "collaborateur"){
        $requete= "SELECT ID_collaborateurs, mot_de_passe, nom FROM `collaborateurs` WHERE email=? ";
        }
        // Si le type n'existe pas
        else {

            return false;
        }
          
        // preparation de ma requete
        if($requetePrepare = mysqli_prepare($connect, $requete)){
            // bind mes valeur avec les ?
            mysqli_stmt_bind_param($requetePrepare, "s", $saisie_email);
            // execution de la requete prepare
            mysqli_stmt_execute($requetePrepare);
            // association de la valeur de la colonne id_clients à la variable $id
            // $row['id_clients']
            mysqli_stmt_bind_result($requetePrepare, $id, $motDePasse, $nom);
            // recuperation des valeurs
            mysqli_stmt_fetch($requetePrepare);
        
            // si j'ai un client qui n'existe pas avec un email
            if ($id == null) {

                return false;
            }

            return password_verify($saisie_MotDePasse, $motDePasse);
        }

        else {
            return false;
        }
    }

    function session(mysqli $connect, string $saisie_email, string $type){
       
        if($type == "client"){
            $requete="SELECT `nom`,`ID_clients` FROM `clients` WHERE `email`= ?";
        }
          
        else if($type == "collaborateur"){
            $requete="SELECT `nom`,`ID_collaborateurs` FROM `collaborateurs` WHERE `email`= ?";
        }

       if($requetePrepare = mysqli_prepare($connect, $requete)){
        
        mysqli_stmt_bind_param($requetePrepare, "s", $saisie_email);
       
        mysqli_stmt_execute($requetePrepare);
       
        mysqli_stmt_bind_result($requetePrepare, $nom, $id);
        
        mysqli_stmt_fetch($requetePrepare);

        $_SESSION["nom"] = $nom;

        $_SESSION["ID"] = $id;

        $_SESSION["type"] = $type;

        $_SESSION["email"] = $saisie_email;

       }
    }

?>