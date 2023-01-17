<?php 
    
    $connect = connectionBDD();

    $SelectID=$_SESSION["ID"];
    $requete="SELECT * FROM `clients` WHERE ID_clients ='". $SelectID."'" ;

    if ($result=mysqli_query ($connect,$requete)) {
        // fetch_assoc=recuperée les valeur dans un tableau associatif
    $row = mysqli_fetch_assoc($result)?>

<form action="index.php?page=updatePrenom" method="post" class="formulaire">

    <label for="prenom">prénom</label>
    <input type="text" value="<?php echo $row["prenom"]; ?>" name="prenom" required>

    <center><button class="bouton">modifier</button></center>
</form>

<?php
    }
mysqli_close($connect);
?> 