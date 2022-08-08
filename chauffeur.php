<?php
var_dump($_POST);
include("fonction/Bdd.php");
// $connect = mysqli_connect ("localhost","root","","monprojet");
// if (mysqli_connect_errno()) {
//    echo "erreur" . mysqli_connect_error();
//    exit();
// }
// echo "good";

$saisie_lieux_de_depart=$_POST ["lieux_de_depart"];
$saisie_adresse_arrivee=$_POST ["adresse_arrivee"];
$saisie_date_de_depart=$_POST ["date_de_depart"];
$saisie_heure_de_depart=$_POST ["heure_de_depart"];
$SaisieId=$_POST ["ID"];
$requete= "INSERT INTO `chauffeur`(`lieux de depart`, `adresse arrivee`, `date de depart`, `heure de depart`, idclient) VALUES ('$saisie_lieux_de_depart','$saisie_adresse_arrivee','$saisie_date_de_depart','$saisie_heure_de_depart','$SaisieId')";
if (mysqli_query($connect, $requete)) {
    echo "compte créer";
  } else {
    echo "Erreur: " . $requete . "<br>" . mysqli_error($connect);
    exit();
  }

?>