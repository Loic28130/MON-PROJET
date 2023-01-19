<!-- SELECT -->
<?php

$connect = connectionBDD();

$saisie_email=$_POST ["email"];
$saisie_MotDePasse=$_POST ["mot_de_passe"];
$type=$_POST ["type"];

if($type == "client"){
  $requete= "SELECT * FROM `clients` WHERE email='$saisie_email'";
}

else if($type == "collaborateur"){
  $requete= "SELECT * FROM `collaborateurs` WHERE email='$saisie_email'";
}

// Si le type n'existe pas
else {
  $_SESSION['danger'] = "Le type $type n'est pas geré";
  
    header ("location:index.php?page=connection&type=$type");
    exit();
}

// Execution de la requete et recuperation du resultat
if ($result = mysqli_query($connect, $requete)) {
  
  // Recuperation des données venant de la base en le mettant dans un tableau associatif
  $row = mysqli_fetch_assoc($result);
  
  // si j'ai un client qui n'existe pas avec un email
  if ($row == false) {
    // echo "erreur de saisie";    
    $_SESSION['danger'] = 'Identifiant ou mot de passe incorrecte';
  
    header ("location:index.php?page=connection&type=$type");
    exit();
  }
  
  // si le mot de passe ne correspond pas a celui de la bdd
  if(!password_verify($saisie_MotDePasse, $row["mot_de_passe"]))
  {
    // echo "erreur de saisie";    
    $_SESSION['danger'] = 'Identifiant ou mot de passe incorrecte';
  
    header ("location:index.php?page=connection&type=$type");
    exit();
  }

  // si il exist un client et que le mot de passe est correcte
  // affichage du message de success
  $_SESSION['success'] = 'Vous êtes maintenant connecté';

  // Set session variables
  $_SESSION["nom"] = $row["nom"];
  $_SESSION["type"] = $type;

  if ($type=="client"){
    $_SESSION["ID"] = $row["ID_clients"];
    header ("location:index.php?page=prise_RDV_chauffeur");
  }

  else if ($type=="collaborateur"){
    $_SESSION["ID"] = $row["ID_collaborateurs"];
    header ("location:index.php?page=liste_chauffeur");
  }
  
} 

else {
  echo "erreur " . $requete . "<br>" . mysqli_error($connect);
}

?>


