<?php 

    $connect = connectionBDD();

    $SelectID=$_SESSION["ID"];
    $requete="SELECT nom FROM `clients` WHERE ID_clients = ?" ;

    if($requetePrepare = mysqli_prepare($connect, $requete)){
        
        mysqli_stmt_bind_param($requetePrepare, "s", $SelectID);
        
        mysqli_stmt_execute($requetePrepare);
       
        mysqli_stmt_bind_result($requetePrepare, $nom);
        
        mysqli_stmt_fetch($requetePrepare);?>

<form action="index.php?page=updateNom" method="post" class="formulaire">
    <label for="nom">nom</label>
    <input type="text" value="<?php echo $nom; ?>" name="nom" required autofocus>
    
    <center><button class="bouton">modifier</button></center>
</form>

<?php
    }
mysqli_close($connect);
?> 