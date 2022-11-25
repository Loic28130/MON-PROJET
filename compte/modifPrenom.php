<?php
// var_dump ($_POST);


include("fonction/Bdd.php");

$saisie_prenom=$_POST ["prenom"];
$SaisieId=$_SESSION ["ID"];
$requete= "UPDATE `clients` SET`prenom`='".$saisie_prenom."' WHERE  `IDclient`='".$SaisieId."'";

if (mysqli_query($connect, $requete)) {
  $_SESSION['success'] = 'modification réussi';
  header ("location:index.php?page=MonCompte");
  } else {
    echo "Error: " . $requete . "<br>" . mysqli_error($connect);
  }
?>
 