<?php
  // var_dump ($_POST);


  $connect = connectionBDD();

  
  $SaisieId=$_SESSION ["ID"];
  $requete= "DELETE FROM `collaborateurs` WHERE ID_collaborateurs= ?";

  if($requetePrepare = mysqli_prepare($connect, $requete)){
        
    mysqli_stmt_bind_param($requetePrepare, "s", $SaisieId);
    
    mysqli_stmt_execute($requetePrepare);
   
    
      session_destroy ();
      session_start();
      $_SESSION["info"] = 'votre collaborateur a bien été supprimer';
      header ("location:index.php?page=liste_collaborateurs_admin");
      
      

  } 
    
    else {
      echo "Error: " . $requete . "<br>" . mysqli_error($connect);
    }

  
?>