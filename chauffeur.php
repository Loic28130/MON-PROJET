<?php
// var_dump($_POST);
$connect = connectionBDD();

$saisie_lieux_de_depart=$_POST ["lieux_de_depart"];
$saisie_adresse_arrivee=$_POST ["adresse_arrivee"];
$saisie_date_de_depart=$_POST ["date_de_depart"];
$saisie_heure_de_depart=$_POST ["heure_de_depart"];
$SaisieId=$_POST ["ID"];
$requete= "INSERT INTO `rdv_chauffeur`( adresse_de_depart, adresse_arrivee, `date_de_depart`, `heure_de_depart`, `ID_clients`)  VALUES (?, ?, ?, ?, ?)";

if  ($requetePrepare = mysqli_prepare($connect, $requete)){
  // bind mes valeur avec les ?
  mysqli_stmt_bind_param($requetePrepare, "sssss", $saisie_lieux_de_depart, $saisie_adresse_arrivee, $saisie_date_de_depart, $saisie_heure_de_depart, $SaisieId);
  // execution de la requete prepare
  mysqli_stmt_execute($requetePrepare);

    $_SESSION['success'] = 'RDV enregistré';
    header ("location:index.php?page=index");
  } 
  
  else {
    echo "Erreur: " . $requete . "<br>" . mysqli_error($connect);
    exit();
  }

?>