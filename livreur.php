<?php
var_dump($_POST);
include("fonction/Bdd.php");
// $connect = mysqli_connect ("localhost","root","","monprojet");
// if (mysqli_connect_errno()) {
//    echo "erreur" . mysqli_connect_error();
//    exit();
// }
// echo "good";

$saisie_recuperation=$_POST ["recuperation"];
$saisie_destination=$_POST ["destination"];
$saisie_date_de_recuperation=$_POST ["date_de_recuperation"];
$SaisieId=$_POST ["ID"];
$requete= "INSERT INTO `livreur`(`recuperation`, `destination`, `date_de_recuperation` , IdClient) VALUES ('$saisie_recuperation','$saisie_destination','$saisie_date_de_recuperation','$SaisieId')";
if (mysqli_query($connect, $requete)) {
    echo "compte créer";
  } else {
    echo "Erreur: " . $requete . "<br>" . mysqli_error($connect);
    exit();
  }

?>