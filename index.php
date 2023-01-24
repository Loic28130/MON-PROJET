<?php
 session_start();
 include ("fonction/fonctions.php");
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>chauffeur/livreur privée</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/fonction.js"></script>
</head>
<body>

<header>
    <span><h1>chauffeur/livreur privée</h1></span>
    <a href="index.php?page=index" class="bouton">acceuil</a>
    

    <?php  if (!connecter()) { ?>
        <a href="index.php?page=connection&type=collaborateur" class="bouton">professionnel</a>
        <a href="index.php?page=connection&type=client" class="bouton">particulier</a>
    <?php } 

       else if (connecter_client()){ ?>
       <div class="dropdown">
            <div class="boutonmenuprincipal"><?php echo ($_SESSION["nom"]);?></div>
            <div class="dropdown-child">
                <a href="index.php?page=MonCompte">mon compte</a>
                <a href="index.php?page=prise_RDV_chauffeur">prise de RDV</a>
                <a href="index.php?page=liste_chauffeur_client">mes RDV</a>
                <a href="index.php?page=deconnect">se deconnecter</a>
            </div>
        </div>
    <?php } 
    else if (connecter_collaborateur()){ ?>
       <div class="dropdown">
            <div class="boutonmenuprincipal"><?php echo ($_SESSION["nom"]);?></div>
            <div class="dropdown-child">
                <a href="index.php?page=deconnect">liste des RDV</a>
                <a href="index.php?page=deconnect">paiement</a>
                <a href="index.php?page=deconnect">se deconnecter</a>
            </div>
        </div>
    <?php } ?> 

    
</header>

<div id="message_erreur">      
    
    <?php
    if (isset($_SESSION["success"])) {?>

        <div class="success"><?php echo ($_SESSION["success"]);?></div>

        <?php unset($_SESSION["success"]);
    }?>



    <?php
    if (isset($_SESSION["danger"])) {?>

        <div class="danger"><?php echo ($_SESSION["danger"]);?></div>

        <?php unset($_SESSION["danger"]); 
    }
    ?>


<?php
    if (isset($_SESSION["info"])) {?>

        <div class="info"><?php echo ($_SESSION["info"]);?></div>

        <?php unset($_SESSION["info"]); 
    }
    ?>

</div>

</div>
    
<?php
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

        case "deconnect":
            include ("deconnect.php");
        break;

        case "prise_RDV_chauffeur":
            include ("formulaire_chauffeur.php");
        break;

        case "chauffeur":
            include ("chauffeur.php");
        break;

        case "prise_RDV_livreur":
            include ("formulaire_livreur.php");
        break;

        case "livreur":
            include ("livreur.php");
        break;

        case "MonCompte":
            include ("compte/clients/MonCompte.php");
        break;

        case "F_updatePrenom":
            include ("compte/clients/formulaire_modifPrenom.php");
        break;

        case "F_updateNom":
            include ("compte/clients/formulaire_modifNom.php");
        break;

        case "F_updateEmail":
            include ("compte/clients/formulaire_modifEmail.php");
        break;

        case "F_updateMotDePasse":
            include ("compte/clients/formulaire_modifMotDePasse.php");
        break;

        case "updatePrenom":
            include ("compte/clients/modifPrenom.php");
        break;

        case "updateNom":
            include ("compte/clients/modifNom.php");
        break;

        case "updateEmail":
            include ("compte/clients/modifEmail.php");
        break;

        case "updateMotDePasse":
            include ("compte/clients/modifMotDePasse.php");
        break;

        case "F_delete":
            include ("compte/clients/formulaire_supprimer.php");
        break;

        case "delete":
            include ("compte/clients/supprimer.php");
        break;

        case "liste_chauffeur":
            include ("compte/collaborateurs/liste_chauffeur.php");
        break;

        case "liste_chauffeur_client":
            include ("compte/clients/liste_chauffeur_client.php");
        break;

        
        default : include ("acceuil.php");
    }
?>
    <footer>
        <a href="">nous contacter</a>
    </footer>
    
    
</body>
</html>