<!-- SELECT INTO -->
<?php
// var_dump($_POST);

$connect = mysqli_connect ("localhost","root","","monprojet");
if (mysqli_connect_errno()) {
   echo "erreur" . mysqli_connect_error();
   exit();
}
echo "good";


$saisie_email=$_POST ["email"];
$saisie_MotDePasse=$_POST ["mot_de_passe"];
$requete= "SELECT * FROM `client` WHERE email='$saisie_email' AND MotDePasse='$saisie_MotDePasse'";
if ($result=mysqli_query($connect, $requete)) {
    echo "connecter";

  while ($row = mysqli_fetch_assoc($result)){

// Set session variables
$_SESSION["nom"] = $row["nom"];
}} 

else {
  echo "erreur " . $requete . "<br>" . mysqli_error($connect);
}

header ("location:index.php?page=chauffeur");
?>


