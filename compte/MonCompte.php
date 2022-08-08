
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
            <?php include("fonction/Bdd.php");

            $SelectID=$_SESSION["ID"];
            $requete="SELECT * FROM `client` WHERE IDclient ='". $SelectID."'" ;

            if ($result=mysqli_query ($connect,$requete)) {
                // fetch_assoc=recuperée les valeur dans un tableau associatif
            $row = mysqli_fetch_assoc($result)?>
                <tr class=table2>
                    <td><?php echo $row["prenom"]; ?></td>

                    <td><?php echo $row["nom"]; ?></td>

                    <td><?php echo $row["email"]; ?></td>

                    <td><?php echo "*******"; ?></td>

                    <td><a href="index.php?page=delete"<?php echo $row["IDclient"]; ?>> supprimer le compte</a>
                </tr>

                <div class="modif">
                <a href="index.php?page=F_updatePrenom"<?php echo $row["IDclient"]; ?>>modifier</a></td> 
                <a href="index.php?page=F_updateNom"<?php echo $row["IDclient"]; ?>>modifier</a></td>
                <a href="index.php?page=F_updateEmail"<?php echo $row["IDclient"]; ?>>modifier</a></td>
                <a href="index.php?page=F_updateMotDePasse"<?php echo $row["IDclient"]; ?>>modifier</a></td> 
                </div>
            
            <?php
                }
            
            mysqli_close($connect);
            ?>
        </tbody>
    </table>

</section>


