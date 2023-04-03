<?php
// var_dump ($_POST);


  $connect = connectionBDD();

  $saisie_prenom=$_POST ["prenom"];
  $SaisieId=$_SESSION ["ID"];
  $requete= "UPDATE `clients` SET`prenom`='".$saisie_prenom."' WHERE  `ID_clients`= ?";

  if ($requetePrepare = mysqli_prepare($connect, $requete)){
   
    mysqli_stmt_bind_param($requetePrepare, "s", $SaisieId);
    
    mysqli_stmt_execute($requetePrepare);

    $_SESSION['success'] = 'modification réussi';
    header ("location:index.php?page=MonCompte");
    } 
    
    else {
      echo "Error: " . $requete . "<br>" . mysqli_error($connect);
    }
?>
 