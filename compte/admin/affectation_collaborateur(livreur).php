<?php
var_dump ($_GET);


  $connect = connectionBDD();
  $IDcollaborateurs=$_GET ["IDcollaborateurs"];
  $IDrdvLivreur=$_GET ["IDrdvLivreur"];
  $requete="UPDATE `rdv_livreur` SET`ID_collaborateurs`='".$IDcollaborateurs."' WHERE  `ID_RDV_livreur`= $IDrdvLivreur";

  if ($requetePrepare = mysqli_prepare($connect, $requete)){
    
    // mysqli_stmt_bind_param($requetePrepare, "s", $SaisieId);
    
    mysqli_stmt_execute($requetePrepare);

    $_SESSION['success'] = 'valider';
    header ("location:index.php?page=liste_livreur_admin");
    } 
    
    else {
      echo "Error: " . $requete . "<br>" . mysqli_error($connect);
  }
?>
 