<?php
var_dump ($_GET);


  $connect = connectionBDD();
  $IDcollaborateurs=$_GET ["IDcollaborateurs"];
  $IDrdvChauffeur=$_GET ["IDrdvChauffeur"];
  $requete="UPDATE `rdv_chauffeur` SET`ID_collaborateurs`='".$IDcollaborateurs."' WHERE  `ID_RDV_chauffeur`= $IDrdvChauffeur";

  if ($requetePrepare = mysqli_prepare($connect, $requete)){
    
    // mysqli_stmt_bind_param($requetePrepare, "s", $SaisieId);
    
    mysqli_stmt_execute($requetePrepare);

    $_SESSION['success'] = 'valider';
    header ("location:index.php?page=validation_collaborateurs_chauffeur");
    } 
    
    else {
      echo "Error: " . $requete . "<br>" . mysqli_error($connect);
  }
?>
 