
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
            $requete="SELECT * FROM `clients` WHERE IDclient ='". $SelectID."'" ;

            if ($result=mysqli_query ($connect,$requete)) {
                // fetch_assoc=recuperée les valeur dans un tableau associatif
            $row = mysqli_fetch_assoc($result)?>
                <tr class=table2>
                    <td><?php echo $row["prenom"]; ?></td>

                    <td><?php echo $row["nom"]; ?></td>

                    <td><?php echo $row["email"]; ?></td>

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


