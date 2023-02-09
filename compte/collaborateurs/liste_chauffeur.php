<div id="onglets">
        <button class="ongletvert"><a href="index.php?page=liste_chauffeur">chauffeur</a></button>
        <button class="ongletblanc"><a href="index.php?page=liste_livreur">livreur</a></button>
    </div>
        <section id="Contenu">

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
                <td>paiment</td>
                
            </tr>
        </thead>
        <tbody>
            <?php $connect = connectionBDD();

                $SelectID=$_SESSION["ID"];
                $requete="SELECT cli.nom , cli.prenom , adresse_de_depart , adresse_arrivee , date_de_depart , heure_de_depart , ID_RDV_chauffeur FROM rdv_chauffeur as rdv
                INNER JOIN clients as cli on rdv.ID_clients=cli.ID_clients
                 WHERE `ID_collaborateurs` =?" ;

                if($requetePrepare = mysqli_prepare($connect, $requete)){
                    // bind mes valeur avec les ?
                    mysqli_stmt_bind_param($requetePrepare, "s", $SelectID);
                    // execution de la requete prepare
                    mysqli_stmt_execute($requetePrepare);
                    // association de la valeur de la colonne id_clients à la variable $id
                    // $row['id_clients']
                    mysqli_stmt_bind_result($requetePrepare, $nom, $prenom, $adresseDeDepart, $adresseArrivee, $dateDeDepart, $heureDeDepart , $IDrdvChauffeur);
                    // recuperation des valeurs
                   while (mysqli_stmt_fetch($requetePrepare)){
                    ?>
                    <tr class=liste2>
                            <td><?php echo $nom; ?></td>

                            <td><?php echo $prenom; ?></td>

                            <td><?php echo $adresseDeDepart; ?></td>

                            <td><?php echo $adresseArrivee; ?></td>

                            <td><?php echo $dateDeDepart; ?></td>

                            <td><?php echo $heureDeDepart; ?></td>

                            <td><a href="index.php?page=paiement&typeRdv=chauffeur&IDrdvChauffeur=<?php echo $IDrdvChauffeur; ?>">valider le paiment</a></td>
                        </tr>
                       <?php
                   };

                   mysqli_stmt_close($requetePrepare);
                } 
            
            mysqli_close($connect);
            ?>
        </tbody>
    </table>

</section>


