<?php
// var_dump ($_POST);


  $connect = connectionBDD();

  $saisie_email=$_POST ["email"];
  $SaisieId=$_SESSION ["ID"];
  $requete= "UPDATE `clients` SET`email`='".$saisie_email."' WHERE  `IDclient`='".$SaisieId."'";

  if (mysqli_query($connect, $requete)) {
    $_SESSION['success'] = 'modification réussi';
    header ("location:index.php?page=MonCompte");
    } else {
      echo "Error: " . $requete . "<br>" . mysqli_error($connect);
  }
?>
 