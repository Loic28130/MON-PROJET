<!-- INSERT INTO -->
<?php
var_dump($_POST);

$connect = mysqli_connect ("localhost","root","","monprojet");
if (mysqli_connect_errno()) {
   echo "erreur" . mysqli_connect_error();
   exit();
}
echo "good";

$saisie_nom=$_POST ["nom"];
$saisie_prenom=$_POST ["prenom"];
$saisie_email=$_POST ["email"];
$saisie_MotDePasse=$_POST ["mot_de_passe"];
$requete= "INSERT INTO `client`( `nom`, `prenom`, `email`, `MotDePasse`) VALUES ('$saisie_nom','$saisie_prenom','$saisie_email','$saisie_MotDePasse')";
if (mysqli_query($connect, $requete)) {
    echo "compte créer";
  } else {
    echo "Erreur: " . $requete . "<br>" . mysqli_error($connect);
  }
?>