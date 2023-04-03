<?php

    $connect = connectionBDD();

    $SelectID=$_SESSION["ID"];
    $requete="SELECT email FROM `clients` WHERE ID_clients = ?" ;

    if($requetePrepare = mysqli_prepare($connect, $requete)){
        
        mysqli_stmt_bind_param($requetePrepare, "s", $SelectID);
        
        mysqli_stmt_execute($requetePrepare);
       
        mysqli_stmt_bind_result($requetePrepare, $email);
        
        mysqli_stmt_fetch($requetePrepare);?>

<form action="index.php?page=updateEmail" method="post" class="formulaire">

    <label for="email">email</label>
    <input type="email" value="<?php echo $email; ?>" name="email" required>

    <center><button class="bouton">modifier</button></center>
</form>

<?php
    }
mysqli_close($connect);
?> 