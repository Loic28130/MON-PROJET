<!-- SELECT INTO -->
<?php
var_dump($_POST);

$connect = mysqli_connect ("localhost","root","","monprojet");
if (mysqli_connect_errno()) {
   echo "erreur" . mysqli_connect_error();
   exit();
}
echo "good";


$saisie_email=$_POST ["email"];
$saisie_MotDePasse=$_POST ["mot_de_passe"];
$requete= "SELECT * FROM `client` WHERE(`email`, `MotDePasse`) VALUES ('$saisie_email','$saisie_MotDePasse')";
if (mysqli_query($connect, $requete)) {
    echo "connecter";
  } else {
    echo "Erreur: " . $requete . "<br>" . mysqli_error($connect);
  }
?>