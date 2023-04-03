<?php
// var_dump ($_POST);


  $connect = connectionBDD();

  $saisie_email=$_POST ["email"];
  $SaisieId=$_SESSION ["ID"];
  $requete= "UPDATE `clients` SET`email`='".$saisie_email."' WHERE  `ID_clients`= ?";

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
 