<?php
  // var_dump ($_POST);


  $connect = connectionBDD();

  
  $SaisieId=$_SESSION ["ID"];
  $requete= "DELETE FROM `clients` WHERE ID_clients=$SaisieId";

  if (mysqli_query($connect, $requete)) {
      session_destroy ();
      session_start();
      $_SESSION["info"] = 'votre compte a bien été supprimer';
      header ("location:index.php?page=inscription");
      
      

    } else {
      echo "Error: " . $requete . "<br>" . mysqli_error($connect);
    }

  
?>