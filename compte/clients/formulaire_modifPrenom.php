<?php 
    
    $connect = connectionBDD();

    $SelectID=$_SESSION["ID"];
    $requete="SELECT prenom FROM `clients` WHERE ID_clients = ?" ;

    if($requetePrepare = mysqli_prepare($connect, $requete)){
        
        mysqli_stmt_bind_param($requetePrepare, "s", $SelectID);
        
        mysqli_stmt_execute($requetePrepare);
       
        mysqli_stmt_bind_result($requetePrepare, $prenom);
        
        mysqli_stmt_fetch($requetePrepare);?>

<form action="index.php?page=updatePrenom" method="post" class="formulaire">

    <label for="prenom">prénom</label>
    <input type="text" value="<?php echo $prenom; ?>" name="prenom" required>

    <center><button class="bouton">modifier</button></center>
</form>

<?php
    }
mysqli_close($connect);
?> 