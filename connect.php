<!-- SELECT INTO -->
<?php
// var_dump($_POST);

include("fonction/Bdd.php");


$saisie_email=$_POST ["email"];
$saisie_MotDePasse=$_POST ["mot_de_passe"];
$requete= "SELECT * FROM `client` WHERE email='$saisie_email' AND MotDePasse='$saisie_MotDePasse'";
if ($result=mysqli_query($connect, $requete)) {
    echo "connecter";
    
    $row = mysqli_fetch_assoc($result);

    if ($row==true) {$_SESSION['success'] = 'Vous êtes maintenant connecté';}
   
    else {
      // echo "erreur de saisie";
        // gestion d'erreur
          
      $_SESSION['danger'] = 'Identifiant ou mot de passe incorrecte';
    
      header ("location:index.php?page=connection");
      exit();
    }

    // Set session variables
  $_SESSION["nom"] = $row["nom"];

  header ("location:index.php?page=chauffeur");
} 

else {
  echo "erreur " . $requete . "<br>" . mysqli_error($connect);
}

?>


