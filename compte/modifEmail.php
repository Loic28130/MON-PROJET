<?php
// var_dump ($_POST);


include("fonction/Bdd.php");

$saisie_email=$_POST ["email"];
$SaisieId=$_SESSION ["ID"];
$requete= "UPDATE `client` SET`email`='".$saisie_email."' WHERE  `IDclient`='".$SaisieId."'";

if (mysqli_query($connect, $requete)) {
    echo "modif réussi";
  } else {
    echo "Error: " . $requete . "<br>" . mysqli_error($connect);
  }
?>
 