<?php
// var_dump ($_POST);


  $connect = connectionBDD();

  $saisie_nom=$_POST ["nom"];
  $SaisieId=$_SESSION ["ID"];
  $requete= "UPDATE `clients` SET`nom`='".$saisie_nom."' WHERE  `ID_clients`= ?";

  if ($requetePrepare = mysqli_prepare($connect, $requete)){
   
    mysqli_stmt_bind_param($requetePrepare, "s", $SaisieId);
    
    mysqli_stmt_execute($requetePrepare);

    $_SESSION['success'] = 'modification réussi';
    $_SESSION["nom"] = $saisie_nom;
    header ("location:index.php?page=MonCompte");
    } 
    
    else {
      echo "Error: " . $requete . "<br>" . mysqli_error($connect);
    }
?>
 