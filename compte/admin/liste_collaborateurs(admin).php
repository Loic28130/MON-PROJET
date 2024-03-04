<div id="onglets">
    <button class="ongletvert"><a href="index.php?page=F_ajout_collaborateurs_admin">ajout collaborateurs</a></button>
</div>

<section id="Contenu">

    <!-- tableau d'affichage de $result -->
    <table class=tb>
    <thead style="background: navy; color: white;">
            <tr class=>
                <td>Nom:</td>
                <td>Prenom:</td>
                <td>adresse mail:</td>
            </tr>
        </thead>
        
        <tbody>
            <?php $connect = connectionBDD();
            // var_dump()
                // $SelectID=$_SESSION["ID"];
                $requete="SELECT ID_collaborateurs , nom , prenom , email FROM collaborateurs";

                if($requetePrepare = mysqli_prepare($connect, $requete)){
                    
                    // mysqli_stmt_bind_param($requetePrepare,);
                    
                    mysqli_stmt_execute($requetePrepare);
                     
                    mysqli_stmt_bind_result($requetePrepare, $ID_collaborateurs , $nom, $prenom, $adresseMail);
                    
                   while (mysqli_stmt_fetch($requetePrepare)){
                    ?>
                    <tr class=>
                            <td><?php echo $nom; ?></td>

                            <td><?php echo $prenom; ?></td>

                            <td><?php echo $adresseMail; ?></td>

                            <td><a href="index.php?page=Fmodif_collaborateur(admin)&IDcollaborateurs=<?php echo $ID_collaborateurs?>">modifier</a></td>

                            <td><a href="index.php?page=delete(admin)&IDcollaborateurs=<?php echo $ID_collaborateurs?>" onclick="return confirmation()">supprimer le collaborateur</a><td>
                    </tr>

                    <!-- <div class="modif">
                    <a href="index.php?page=F_updatePrenom">modifier</a></td> 
                    <a href="index.php?page=F_updateNom">modifier</a></td>
                    <a href="index.php?page=F_updateEmail">modifier</a></td>
                    <a href="index.php?page=F_updateMotDePasse">modifier</a></td> 
                    </div> -->
                       <?php
                   };

                   mysqli_stmt_close($requetePrepare);
                } 
            
            mysqli_close($connect);
            ?>
        </tbody>
    </table>

</section>


