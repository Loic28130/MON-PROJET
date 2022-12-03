<?php
  var_dump ($_POST);


  $connect = connectionBDD();

  // $saisie_nom=$_POST ["nom"];
  // $saisie_prenom=$_POST ["prenom"];
  // $saisie_email=$_POST ["email"];
  // $saisie_password=$_POST ["mot_de_passe"];
  $SaisieId=$_SESSION ["ID"];
  $requete= "DELETE FROM `clients` WHERE IDclient=$SaisieId";

  if (mysqli_query($connect, $requete)) {
      session_destroy ();
      session_start();
      $_SESSION["info"] = 'votre compte a bien été supprimer';
      header ("location:index.php?page=inscription");
      
      

    } else {
      echo "Error: " . $requete . "<br>" . mysqli_error($connect);
    }

  
?>