<?php
// var_dump ($_POST);


include("fonction/Bdd.php");

// $good_mot_de_passe = verif ($_POST ["mot_de_passe"],$_SESSION["ID"],$connect);
//   if ($good_mot_de_passe==false) {
//     $_SESSION['danger'] = 'mot de passe actuel incorrect';
    
//       header ("location:index.php?page=F_update");
//       exit();
//   }

$saisie_nom=$_POST ["nom"];
$SaisieId=$_SESSION ["ID"];
$requete= "UPDATE `client` SET`nom`='".$saisie_nom."' WHERE  `IDclient`='".$SaisieId."'";

if (mysqli_query($connect, $requete)) {
    echo "modif réussi";
  } else {
    echo "Error: " . $requete . "<br>" . mysqli_error($connect);
  }
?>
 