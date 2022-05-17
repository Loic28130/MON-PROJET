<?php
 session_start();
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chauffeur/livreur privée</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>
    <span><h1>chauffeur/livreur privée</h1></span>

    <?php  if (!isset($_SESSION["nom"])) { ?>
        <a href="index.php?page=connection" class="bouton">se connecter</a>
    <?php } 

       else { ?>
        <div class="bouton"><?php echo ($_SESSION["nom"]);?></div>
     <?php } ?> 

    
</header>

    <?php
// var_dump ($_POST);

//definition de la 
if (!isset($_GET["page"])) {
    $_GET["page"]="index";
}

switch ($_GET["page"]) {
    

    case "index":
        include ("acceuil.php");
    break;

    case "inscription":
        include ("formulaire_inscription.php");
    break;

    case "inscrire":
        include ("inscrire.php");
    break;

    case "connection":
        include ("formulaire_connection.php");
    break;

    case "connect":
        include ("connect.php");
    break;

    
    default : include ("acceuil.php");
}
?>
    <footer>
        <a href="">nous contacter</a>
    </footer>
    
    
</body>
</html>