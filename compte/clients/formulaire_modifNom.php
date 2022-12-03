<?php 

    $connect = connectionBDD();

    $SelectID=$_SESSION["ID"];
    $requete="SELECT * FROM `clients` WHERE IDclient ='". $SelectID."'" ;

    if ($result=mysqli_query ($connect,$requete)) {
        // fetch_assoc=recuperée les valeur dans un tableau associatif
    $row = mysqli_fetch_assoc($result)?>

<form action="index.php?page=updateNom" method="post" class="formulaire">
    <label for="nom">nom</label>
    <input type="text" value="<?php echo $row["nom"]; ?>" name="nom" required autofocus>
    
    <center><button class="bouton">modifier</button></center>
</form>

<?php
    }
mysqli_close($connect);
?> 