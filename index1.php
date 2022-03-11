
<?php
  require_once "config/MesVariables.php";



  //-------------- Retour vers la page index, par exemple avec un header location
  
  //------------------- Recup des param de l'updatz
if (isset($_GET["P1"]) && !empty($_GET["P1"])) {
  $IdConsultant = $_GET["P1"];
  $bId = true;
} else {
  $bId=false;
  $IdConsultant=0;
}


if (isset($_GET["err"]) && !empty($_GET["err"])) {
  $bErr = $_GET["err"];
} else {
  $bErr=false;
}
//--------------------------------------



switch ($bErr) { //Selon


case 1 : //action//
case 2 : //action
case 3 : //action

  default :
  //Action au cas ou

}

  
  //------------------------------------------------------------------------------

?>


<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icone/consulting.png">

    <title><?php print TITRE_PAGE;?></title>

    <!-- J'intègre une bibliothèque bootstrap -->
   <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">-->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

   
   <!-- J'applique ce qui m'interesse dans une feuille de style embarquée et personnalisée -->
    <style>
      body {
        padding-top: 3.5rem;/*Je fonctionne en rem et non en px pour l'adaptation automatique des éléments dans l'écran*/
    }

    .headerconsultant {
      background-color: #d6edfd;
    }
    </style>
  </head>

  <body>

<!-- Mon header via ma NavBar BootStrap -->


<!-- Pour mon header j'utilise le composant navBar de bootstrap -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top headerconsultant">
    <a class="navbar-brand" href="#"><?php print SOCIETE_FR;?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php?lang=FR"><?php print ACCUEIL_FR;?> <span class="sr-only"><!-- Une image par exemple... --></span></a>
        </li>

        <li class="nav-item active">
          <a class="nav-link" href="shopping.php?lang=FR"><?php print SHOPPING_FR;?> <span class="sr-only"><!-- Une image par exemple... --></span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="#"><?php print CONNECT_FR;?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><?php print ACCOUNT_FR;?></a>
        </li>
      </ul>

      <form class="d-flex" action="page_resultat.php?lang=FR" method="post">
        <input class="form-control me-2" type="search" placeholder="PHP, HTML, Base de données" aria-label="Search" name="sChercher">
        <button class="btn btn-outline-success" type="submit">Chercher</button>
      </form>

    </div>
  </nav>
  <!-- *****************      FIN NAV **************** -->

<!-- Un header qui ne me sert à rien, mais présent pour l'esthétique-->


<!-- Sur BootStrap utiliser : jumbotron  -->

<div class="container">

  <div class="col-md col-lg">
  
    <div class="p-5 mb-4 bg-light rounded-3">

      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Free Consulting</h1>
        <p class="col-md-8 fs-4">
          Le plus important est de mâcher son idée sur un support avant de la coder... Et rien ne vous empêchera de la modifier en cours de route…
        </p>
        <button class="btn btn-primary btn-lg" type="button">Mon bouton</button>
      </div>
    
    </div    


  </div>
  
  
  <!-- **************************************************************  -->

</div> 






<!-- Corps de ma page : J'ai besoin d'un simple contenu -->
<div class="container">
  <div class="row">
    <div class="col-md">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque quidem nihil veniam beatae quasi, ducimus vero ullam itaque? Quia iusto architecto mollitia sunt dolor explicabo nam quod numquam, incidunt distinctio!</p>
    </div>
  </div>
</div>
<!-- *************      FIN SECTION CORPS ************** -->



<!-- ************ Mon pied de page *********-->
<br>
<footer class="text-center fixed-bottom">
<div class="container">
  <hr>
  <p>&copy; Exercice Front / back & développement des réflexions métiers</p>
</div>
</footer>
<!-- *************      FIN PIED DE PAGE ******** -->



    <!-- Bibliothèque Bootstrap + Bibliothèque JavaScript
    ================================================== -->
    <!-- Comme d'hab JS fonctionne plus rapidement vers le bas du document -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
  </body>
</html>
