<!-- INSERT INTO -->
<?php
// var_dump($_POST);


$connect = connectionBDD();

$saisie_prenom=$_POST ["prenom"];
$saisie_nom=$_POST ["nom"];
$saisie_email=$_POST ["email"];
$saisie_MotDePasse=hachage( $_POST ["mot_de_passe"]);
$requete= "INSERT INTO `collaborateurs`( `nom`, `prenom`, `email`, `mot_de_passe`) VALUES (?, ?, ?, ?)";

if ($requetePrepare = mysqli_prepare($connect, $requete)){
  // bind mes valeur avec les ?
  mysqli_stmt_bind_param($requetePrepare, "ssss", $saisie_nom, $saisie_prenom, $saisie_email, $saisie_MotDePasse);
  // execution de la requete prepare
  mysqli_stmt_execute($requetePrepare);
    
    $_SESSION['success'] = 'collaborateur créer';
    header ("location:index.php?page=liste_collaborateurs_admin");
  } 
  
  else {
    echo "Erreur: " . $requete . "<br>" . mysqli_error($connect);
  }
?>