<?php
  // var_dump ($_POST);


  $connect = connectionBDD();

  
  $SaisieId=$_SESSION ["ID"];
  $requete= "DELETE FROM `clients` WHERE ID_clients= ?";

  if($requetePrepare = mysqli_prepare($connect, $requete)){
        
    mysqli_stmt_bind_param($requetePrepare, "s", $SaisieId);
    
    mysqli_stmt_execute($requetePrepare);
   
    
      session_destroy ();
      session_start();
      $_SESSION["info"] = 'votre compte a bien été supprimer';
      header ("location:index.php?page=inscription");
      
      

  } 
    
    else {
      echo "Error: " . $requete . "<br>" . mysqli_error($connect);
    }

  
?>