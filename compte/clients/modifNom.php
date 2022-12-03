<?php
// var_dump ($_POST);


  $connect = connectionBDD();

  $saisie_nom=$_POST ["nom"];
  $SaisieId=$_SESSION ["ID"];
  $requete= "UPDATE `clients` SET`nom`='".$saisie_nom."' WHERE  `IDclient`='".$SaisieId."'";

  if (mysqli_query($connect, $requete)) {
      echo "modif réussi";
    } else {
      echo "Error: " . $requete . "<br>" . mysqli_error($connect);
    }
?>
 