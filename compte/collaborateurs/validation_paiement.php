<?php
var_dump($_POST);

$connect = connectionBDD();
$Rdv = $_GET["typeRdv"];
if( $Rdv == "chauffeur"){     
    $saisie_nom=$_POST ["nom"];
    $saisie_prenom=$_POST ["prenom"];
    $saisie_dateDeDepart=$_POST ["date"];
    $saisie_prix=$_POST ["prix"];
    $saisie_ID=$_POST ["ID"];
    $requete= "INSERT INTO `paiement`( `nom`, `prenom`, `date`, `prix`, `ID_RDV_chauffeur`) VALUES (?, ?, ?, ?, ?)";

    if ($requetePrepare = mysqli_prepare($connect, $requete)){
      // bind mes valeur avec les ?
      mysqli_stmt_bind_param($requetePrepare, "sssss", $saisie_nom, $saisie_prenom, $saisie_dateDeDepart, $saisie_prix, $saisie_ID);
      // execution de la requete prepare
      mysqli_stmt_execute($requetePrepare);
      
    $_SESSION['success'] = 'paiement valider';
    header ("location:index.php?page=liste_chauffeur&IDrdvChauffeur");
    } else {
      echo "Erreur: " . $requete . "<br>" . mysqli_error($connect);
      exit();
    }
  }
  
  else if($Rdv == "livreur"){
    $saisie_nom=$_POST ["nom"];
    $saisie_prenom=$_POST ["prenom"];
    $saisie_dateDeDepart=$_POST ["date"];
    $saisie_prix=$_POST ["prix"];
    $saisie_ID=$_POST ["ID"];
    $requete= "INSERT INTO `paiement`( `nom`, `prenom`, `date`, `prix`, `ID_RDV_livreur`) VALUES (?, ?, ?, ?, ?)";

      if ($requetePrepare = mysqli_prepare($connect, $requete)){
        // bind mes valeur avec les ?
        mysqli_stmt_bind_param($requetePrepare, "sssss", $saisie_nom, $saisie_prenom, $saisie_dateDeDepart, $saisie_prix, $saisie_ID);
        // execution de la requete prepare
        mysqli_stmt_execute($requetePrepare);

      $_SESSION['success'] = 'paiement valider';
      header ("location:index.php?page=liste_livreur&IDrdvlivreur");
      } 
      
      else {
        echo "Erreur: " . $requete . "<br>" . mysqli_error($connect);
        exit();
      }
  }
?>