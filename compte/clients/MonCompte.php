
        <section id="Contenu">

<!-- tableau d'affichage de $result -->
    <table class=table>
        <thead>
            <tr class=table1>
                <td>prénom</td>
                <td>nom</td>
                <td>email</td>
                <td>mot de passe</td>
                
            </tr>
        </thead>
        <tbody>
            <?php $connect = connectionBDD();

            $SelectID=$_SESSION["ID"];
            $requete="SELECT prenom, nom, email FROM `clients` WHERE ID_clients = ?" ;

            if($requetePrepare = mysqli_prepare($connect, $requete)){
        
                mysqli_stmt_bind_param($requetePrepare, "s", $SelectID);
                
                mysqli_stmt_execute($requetePrepare);
               
                mysqli_stmt_bind_result($requetePrepare ,$prenom ,$nom ,$email);
                
                mysqli_stmt_fetch($requetePrepare);?>
                <tr class=table2>
                    <td><?php echo $prenom; ?></td>

                    <td><?php echo $nom; ?></td>

                    <td><?php echo $email; ?></td>

                    <td><?php echo "*******"; ?></td>

                    <td><a href="index.php?page=delete" onclick="return confirmation()">supprimer le compte</a><td>
                </tr>

                <div class="modif">
                <a href="index.php?page=F_updatePrenom">modifier</a></td> 
                <a href="index.php?page=F_updateNom">modifier</a></td>
                <a href="index.php?page=F_updateEmail">modifier</a></td>
                <a href="index.php?page=F_updateMotDePasse">modifier</a></td> 
                </div>
            
            <?php
                }
            
            mysqli_close($connect);
            ?>
        </tbody>
    </table>

</section>


