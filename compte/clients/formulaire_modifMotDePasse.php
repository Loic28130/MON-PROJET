<?php
// var_dump ($_POST);

    $connect = connectionBDD();

    $SelectID=$_SESSION["ID"];
    $requete="SELECT * FROM `clients` WHERE ID_clients = ?" ;

    if($requetePrepare = mysqli_prepare($connect, $requete)){
        
        mysqli_stmt_bind_param($requetePrepare, "s", $SelectID);
        
        mysqli_stmt_execute($requetePrepare);
       
        mysqli_stmt_bind_result($requetePrepare, $email);
        
        mysqli_stmt_fetch($requetePrepare);?>

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