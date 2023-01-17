
        <section id="Contenu">

<!-- tableau d'affichage de $result -->
    <table class=table>
        <thead>
            <tr class=table1>
                <td>lieux de départ</td>
                <td>adresse d'arrivée</td>
                <td>date de départ</td>
                <td>heure de départ</td>
                
            </tr>
        </thead>
        <tbody>
            <?php $connect = connectionBDD();

                $SelectID=$_SESSION["ID"];
                $requete="SELECT * FROM `rdv_chauffeur` WHERE `ID_collaborateurs` ='". $SelectID."'" ;

                if ($result=mysqli_query ($connect,$requete)) {

                    // fetch_assoc=recuperée les valeur dans un tableau associatif
                    $row = mysqli_fetch_assoc($result);
                    if ($row==true){ ?>
                    <tr class=table2>
                        <td><?php echo $row["lieux de depart"]; ?></td>

                        <td><?php echo $row["adresse arrivee"]; ?></td>

                        <td><?php echo $row["date de depart"]; ?></td>

                        <td><?php echo  $row["heure de depart"]; ?></td>
                    </tr>


                    <!-- <div class="modif">
                    <a href="index.php?page=F_updatePrenom"<?php echo $row["ID_clients"]; ?>>modifier</a></td> 
                    <a href="index.php?page=F_updateNom"<?php echo $row["ID_clients"]; ?>>modifier</a></td>
                    <a href="index.php?page=F_updateEmail"<?php echo $row["ID_clients"]; ?>>modifier</a></td>
                    <a href="index.php?page=F_updateMotDePasse"<?php echo $row["ID_clients"]; ?>>modifier</a></td> 
                    </div> -->
            
            <?php
                    }   
                    else {
                        echo "vide";
                        }
                }

                   
            
            mysqli_close($connect);
            ?>
        </tbody>
    </table>

</section>


