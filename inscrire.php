<!-- INSERT INTO -->
<?php
// var_dump($_POST);


$connect = connectionBDD();

$saisie_prenom=$_POST ["prenom"];
$saisie_nom=$_POST ["nom"];
$saisie_email=$_POST ["email"];
$saisie_MotDePasse=hachage( $_POST ["mot_de_passe"]);
$requete= "INSERT INTO `clients`( `nom`, `prenom`, `email`, `mot_de_passe`) VALUES (?, ?, ?, ?)";

if ($requetePrepare = mysqli_prepare($connect, $requete)){
  // bind mes valeur avec les ?
  mysqli_stmt_bind_param($requetePrepare, "ssss", $saisie_nom, $saisie_prenom, $saisie_email, $saisie_MotDePasse);
  // execution de la requete prepare
  mysqli_stmt_execute($requetePrepare);
    
    $_SESSION['success'] = 'compte créer vous pouvez vous connectée';
    header ("location:index.php?page=connection&type=client");
  } 
  
  else {
    echo "Erreur: " . $requete . "<br>" . mysqli_error($connect);
  }
?>