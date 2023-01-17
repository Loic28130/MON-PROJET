<?php

function connectionBDD(){
    $connect = mysqli_connect ("localhost","root","","monprojet");
    if (mysqli_connect_errno()) {
       echo "erreur" . mysqli_connect_error();
       exit();
    }
    return $connect;
 }


function verif(string $MotDePasse,int $ID,mysqli $connect) {
    $requete=" SELECT * FROM `clients` WHERE `mot_de_passe`='$MotDePasse' and`ID_clients`='$ID';";
      if ($result=mysqli_query($connect, $requete)) {
         echo "connecter";
         
         $row = mysqli_fetch_assoc($result);
   
         return $row;
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

?>