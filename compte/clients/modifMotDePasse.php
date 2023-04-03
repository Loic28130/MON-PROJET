<?php
// var_dump ($_POST);


  $connect = connectionBDD();
  $motDePasse = hachage($_POST ["mot_de_passe"]);
  $good_mot_de_passe = verif ($motDePasse ,$_SESSION["ID"], $connect);
    if ($good_mot_de_passe==false) {
      $_SESSION['danger'] = 'mot de passe actuel incorrect';
      
        header ("location:index.php?page=F_updateMotDePasse");
        exit();
    }

  $saisie_password = hachage($_POST ["nouveau_mot_de_passe"]);
  $SaisieId = $_SESSION["ID"];
  $requete= "UPDATE `clients` SET`mot_de_passe`='".$saisie_password."' WHERE  `ID_clients`='".$SaisieId."'";

  if (mysqli_query($connect, $requete)) {
    $_SESSION['success'] = 'modification réussi';
    header ("location:index.php?page=MonCompte");
    } else {
      echo "Error: " . $requete . "<br>" . mysqli_error($connect);
    }
?>
 