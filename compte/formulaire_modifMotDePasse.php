<?php
// var_dump ($_POST);

include("fonction/Bdd.php");

    $SelectID=$_SESSION["ID"];
    $requete="SELECT * FROM `client` WHERE IDclient ='". $SelectID."'" ;

    if ($result=mysqli_query ($connect,$requete)) {
        // fetch_assoc=recuperée les valeur dans un tableau associatif
    $row = mysqli_fetch_assoc($result)?>

<form action="index.php?page=updateMotDePasse" method="post" class="formulaire">

    <label for="mot_de_passe">ancien mot de passe</label>
    <input type="password" name="mot_de_passe">

    <label for="mot_de_passe">nouveau mot de passe</label>
    <input type="password" name="nouveau_mot_de_passe">

    

    <center><button class="bouton">modifier</button></center>
</form>

<?php
    }
mysqli_close($connect);
?> 