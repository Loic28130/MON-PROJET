<?php
  var_dump ($_GET); 

  $connect = connectionBDD();

  $ID_collaborateurs=$_GET ["IDcollaborateurs"];
  $requete= "DELETE FROM `collaborateurs` WHERE ID_collaborateurs= ?";
  
  if($requetePrepare = mysqli_prepare($connect, $requete)){
        
    mysqli_stmt_bind_param($requetePrepare, "s", $ID_collaborateurs);
    
    mysqli_stmt_execute($requetePrepare);
   
      $_SESSION["info"] = 'votre collaborateur a bien été supprimer';
      header ("location:index.php?page=liste_collaborateurs_admin");
      
  } 
    
    else { 
      echo "Error: " . $requete . "<br>" . mysqli_error($connect);
    }

    

?>