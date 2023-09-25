
<?php
$connect = connectionBDD();

$saisie_email=$_POST ["email"];


$saisie_MotDePasse=$_POST ["mot_de_passe"];
$type=$_POST ["type"];


  // si le mot de passe ne correspond pas a celui de la bdd
  if(!verifPassword($connect, $saisie_email, $saisie_MotDePasse, $type))
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
  session($connect, $saisie_email, $type);
  
  if (connecter_client()){
    header ("location:index.php?page=prise_RDV_chauffeur");
  }

  else if (connecter_collaborateur()){
    header ("location:index.php?page=liste_chauffeur");
  }

  else if (connecter_admin()){
    header ("location:index.php?page=liste_chauffeur_admin");
  }

  exit();

?>