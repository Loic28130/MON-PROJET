<!-- SELECT INTO -->
<?php
// var_dump($_POST);

include("fonction/Bdd.php");


$saisie_email=$_POST ["email"];
$saisie_MotDePasse=$_POST ["mot_de_passe"];
$type=$_POST ["type"];

if($type == "client"){
  $requete= "SELECT * FROM `clients` WHERE email='$saisie_email' AND MotDePasse='$saisie_MotDePasse'";
}

else if($type == "collaborateur"){
  $requete= "SELECT * FROM `collaborateurs` WHERE email='$saisie_email' AND mot_de_passe='$saisie_MotDePasse'";
}

if ($result=mysqli_query($connect, $requete)) {
    echo "connecter";
    
    $row = mysqli_fetch_assoc($result);
    // gestion d'erreur
    if ($row==true) {$_SESSION['success'] = 'Vous êtes maintenant connecté';}
   
    else {
      // echo "erreur de saisie";    
      $_SESSION['danger'] = 'Identifiant ou mot de passe incorrecte';
    
      header ("location:index.php?page=connection");
      exit();
    }

    // Set session variables
  $_SESSION["nom"] = $row["nom"];
  $_SESSION["ID"] = $row["IDclient"];
  $_SESSION["type"] = $type;

  header ("location:index.php?page=prise_RDV_chauffeur");
} 

else {
  echo "erreur " . $requete . "<br>" . mysqli_error($connect);
}

?>


