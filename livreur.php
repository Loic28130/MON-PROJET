<?php
var_dump($_POST);

$connect = connectionBDD();
// if (mysqli_connect_errno()) {
//    echo "erreur" . mysqli_connect_error();
//    exit();
// }
// echo "good";

$saisie_recuperation=$_POST ["recuperation"];
$saisie_destination=$_POST ["destination"];
$saisie_date_de_recuperation=$_POST ["date_de_recuperation"];
$SaisieId=$_POST ["ID"];
$requete= "INSERT INTO `rdv_livreur`( `adresse_de_recuperation`, `adresse_de_livraison`, `date_de_livraison`, `ID_clients`) VALUES (?, ?, ?, ?)";

if  ($requetePrepare = mysqli_prepare($connect, $requete)){
  // bind mes valeur avec les ?
  mysqli_stmt_bind_param($requetePrepare, "ssss", $saisie_recuperation, $saisie_destination, $saisie_date_de_recuperation, $SaisieId);
  // execution de la requete prepare
  mysqli_stmt_execute($requetePrepare);

  $_SESSION['success'] = 'RDV enregistré';
  header ("location:index.php?page=index");
  } else {
    echo "Erreur: " . $requete . "<br>" . mysqli_error($connect);
    exit();
  }

?>