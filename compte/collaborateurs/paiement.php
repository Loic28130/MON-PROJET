
<section id="paiement">

<!-- tableau d'affichage de $result -->
    <table class=liste>
        <thead>
            <tr class=liste1>
                <td>Nom</td>
                <td>Prenom</td>
                <td>lieux de départ</td>
                <td>adresse d'arrivée</td>
                <td>date de départ</td>
                <td>heure de départ</td>
                
            </tr>
        </thead>
        <tbody>
            <?php $connect = connectionBDD();

                $IDcollaborateur=$_SESSION["ID"];
                $SelectID=$_GET["IDrdvChauffeur"];
                $requete="SELECT cli.nom , cli.prenom , adresse_de_depart , adresse_arrivee , date_de_depart , heure_de_depart FROM `rdv_chauffeur` as rdv
                INNER JOIN clients as cli on rdv.ID_clients=cli.ID_clients
                 WHERE `ID_RDV_chauffeur` =? AND ID_collaborateurs =?";
// var_dump($_GET);
// var_dump($_GET["page"]);
                if($requetePrepare = mysqli_prepare($connect, $requete)){
                    // bind mes valeur avec les ?
                    mysqli_stmt_bind_param($requetePrepare, "ss", $SelectID , $IDcollaborateur);
                    // execution de la requete prepare
                    mysqli_stmt_execute($requetePrepare);
                    // association de la valeur de la colonne id_clients à la variable $id
                    // $row['id_clients']
                    mysqli_stmt_bind_result($requetePrepare, $nom, $prenom, $adresseDeDepart, $adresseArrivee, $dateDeDepart, $heureDeDepart);
                    // recuperation des valeurs
                    mysqli_stmt_fetch($requetePrepare);
                    ?>
                    <tr class=liste2>
                            <td><?php echo $nom; ?></td>

                            <td><?php echo $prenom; ?></td>

                            <td><?php echo $adresseDeDepart; ?></td>

                            <td><?php echo $adresseArrivee; ?></td>

                            <td><?php echo $dateDeDepart; ?></td>

                            <td><?php echo $heureDeDepart; ?></td>
                        </tr>
                       <?php
                   

                }
                ?>
                
                <form action="index.php?page=validation_paiement" method="POST" class="formulaire">

                <input type="hidden" value=<?php echo $nom; ?> name="nom">
                <input type="hidden" value=<?php echo $prenom; ?> name="prenom">
                <input type="hidden" value=<?php echo $dateDeDepart; ?> name="date">
                <input type="hidden" value=<?php echo $SelectID; ?> name="ID">

                <label for="prix">prix</label>
                <input type="text" name="prix" required autofocus>
        
                <center><button class="bouton">valider</button></center>
        
            </form>
            <?php
            mysqli_close($connect);
            ?>
        </tbody>
    </table>

</section>


