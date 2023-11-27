<?php
// var_dump ($_POST);


  $connect = connectionBDD();

  $IDcollaborateurs=$_POST ["IDcollaborateurs"];
  $saisie_nom=$_POST ["nom"];
  $saisie_prenom=$_POST ["prenom"];
  $saisie_email=$_POST ["email"];
  $requete= "UPDATE `collaborateurs` SET `nom`= '".$saisie_nom."', `prenom`= '".$saisie_prenom."', `email`= '".$saisie_email."' WHERE  `ID_collaborateurs`= '".$IDcollaborateurs."'";

  if ($requetePrepare = mysqli_prepare($connect, $requete)){
    
    mysqli_stmt_execute($requetePrepare);

    $_SESSION['success'] = 'modification réussi';
    
    header ("location:index.php?page=liste_collaborateurs_admin");
    } 
    
    else {
      echo "Error: " . $requete . "<br>" . mysqli_error($connect);
    }
?>
 