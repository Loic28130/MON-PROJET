<?php
// var_dump ($_POST);

    $connect = connectionBDD();

    $IDcollaborateurs=$_GET ["IDcollaborateurs"];
    $requete="SELECT nom , prenom , email  FROM `collaborateurs` WHERE ID_collaborateurs = ?" ;

    if($requetePrepare = mysqli_prepare($connect, $requete)){
        
        mysqli_stmt_bind_param($requetePrepare, "s" , $IDcollaborateurs);
        
        mysqli_stmt_execute($requetePrepare);
       
        mysqli_stmt_bind_result($requetePrepare, $nom , $prenom , $email);
        
        mysqli_stmt_fetch($requetePrepare);?>

<form action="index.php?page=modif_collaborateur(admin)&IDcollaborateurs=<?php echo $ID_collaborateurs?>" method="post" class="formulaire">
    <label for="nom">nom</label>
    <input type="text" value="<?php echo $nom; ?>" name="nom" required autofocus>

    <label for="prenom">prenom</label>
    <input type="text" value="<?php echo $prenom; ?>" name="prenom" required autofocus>

    <label for="email">email</label>
    <input type="text" value="<?php echo $email; ?>" name="email" required autofocus> 

    <center><button class="bouton">modifier</button></center>
</form>

<?php
    }
mysqli_close($connect);
?> 