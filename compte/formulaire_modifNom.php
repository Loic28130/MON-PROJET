<?php include("fonction/Bdd.php");

    $SelectID=$_SESSION["ID"];
    $requete="SELECT * FROM `client` WHERE IDclient ='". $SelectID."'" ;

    if ($result=mysqli_query ($connect,$requete)) {
        // fetch_assoc=recuperée les valeur dans un tableau associatif
    $row = mysqli_fetch_assoc($result)?>

<form action="index.php?page=updateNom" method="post" class="formulaire">
    <label for="nom">nom</label>
    <input type="text" value="<?php echo $row["nom"]; ?>" name="nom" required autofocus>

    <!-- <label for="prenom">prénom</label>
    <input type="text" value="<?php echo $row["prenom"]; ?>" name="prenom" required>

    <label for="email">email</label>
    <input type="email" value="<?php echo $row["email"]; ?>" name="email" required>

    <label for="mot_de_passe">mot de passe</label>
    <input type="password" name="mot_de_passe"> -->

    

    <center><button class="bouton">modifier</button></center>
</form>

<?php
    }
mysqli_close($connect);
?> 