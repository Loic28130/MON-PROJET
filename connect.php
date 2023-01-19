<!-- SELECT -->
<?php

$connect = connectionBDD();

$saisie_email=$_POST ["email"];

$saisie_MotDePasse=$_POST ["mot_de_passe"];
$type=$_POST ["type"];

if($type == "client"){
  $requete= "SELECT ID_clients, mot_de_passe, nom FROM `clients` WHERE email=?";
}

else if($type == "collaborateur"){
  $requete= "SELECT ID_collaborateurs, mot_de_passe, nom FROM `collaborateurs` WHERE email=?";
}

// Si le type n'existe pas
else {
  $_SESSION['danger'] = "Le type $type n'est pas geré";
  
    header ("location:index.php?page=connection&type=$type");
    exit();
}

// preparation de ma requete
if($requetePrepare = mysqli_prepare($connect, $requete)){
  // bind mes valeur avec les ?
  mysqli_stmt_bind_param($requetePrepare, "s", $saisie_email);
  // execution de la requete prepare
  mysqli_stmt_execute($requetePrepare);
  // association de la valeur de la colonne id_clients à la variable $id
  // $row['id_clients']
  mysqli_stmt_bind_result($requetePrepare, $id, $motDePasse, $nom);
  // recuperation des valeurs
  mysqli_stmt_fetch($requetePrepare);

   // si j'ai un client qui n'existe pas avec un email
   if ($id == null) {
    // echo "erreur de saisie";    
    $_SESSION['danger'] = 'Identifiant ou mot de passe incorrecte';
  
    header ("location:index.php?page=connection&type=$type");
    exit();
  }

  // si le mot de passe ne correspond pas a celui de la bdd
  if(!password_verify($saisie_MotDePasse, $motDePasse))
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
  $_SESSION["nom"] = $nom;
  $_SESSION["type"] = $type;
  $_SESSION["ID"] = $id;

  if ($type=="client"){
    header ("location:index.php?page=prise_RDV_chauffeur");
  }

  else if ($type=="collaborateur"){
    header ("location:index.php?page=liste_chauffeur");
  }

  exit();
}
else
{
  // echo "erreur de saisie";    
  $_SESSION['danger'] = 'Probleme de verification';
  
  header ("location:index.php?page=connection&type=$type");
  exit();
}
?>