<?php
var_dump ($_POST);


include("fonction/Bdd.php");

$saisie_nom=$_POST ["nom"];
$saisie_prenom=$_POST ["prenom"];
$saisie_email=$_POST ["email"];
$saisie_password=$_POST ["mot_de_passe"];
$SaisieId=$_POST ["ID"];
$requete= "UPDATE `client` SET `nom`='".$saisie_nom."',`prenom`='".$saisie_prenom."',`email`='".$saisie_email."', MotDePasse = '".$saisie_password."' WHERE IDclient = $SaisieId";

if (mysqli_query($connect, $requete)) {
    echo "modif réussi";
  } else {
    echo "Error: " . $requete . "<br>" . mysqli_error($connect);
  }
?>