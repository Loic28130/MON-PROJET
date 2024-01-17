
<div id="onglets">
    <button class="ongletvert"><a href="index.php?page=liste_chauffeur_admin">chauffeur</a></button>
    <button class="ongletblanc"><a href="index.php?page=liste_livreur_admin">livreur</a></button>
</div>
<section id="Contenu">

    <!-- tableau d'affichage de $result -->
    <table class=liste>
        <thead>
            <tr class=liste1>
                <td>Nom</td>
                <td>Prenom</td>
                <td>adresse de depart</td>
                <td>adresse d'arrivée</td>
                <td>date de depart</td>
                <td>heure de depart</td>
                <td>collaborateur</td>
                <td>choix du collaborateur</td> 
            </tr>
        </thead>
        
        <tbody>
            <?php $connect = connectionBDD();
            // var_dump()
                // $SelectID=$_SESSION["ID"];
                $requete="SELECT  col.nom , col.prenom , cli.nom , cli.prenom , adresse_de_depart , adresse_arrivee, date_de_depart , heure_de_depart , rdv.ID_RDV_chauffeur , col.ID_collaborateurs FROM rdv_chauffeur as rdv
                 INNER JOIN clients as cli on rdv.ID_clients=cli.ID_clients
                 LEFT JOIN collaborateurs as col on rdv.ID_collaborateurs=col.ID_collaborateurs
                 ORDER BY date_de_depart DESC";

                if($requetePrepare = mysqli_prepare($connect, $requete)){
                    
                    // mysqli_stmt_bind_param($requetePrepare,);
                    
                    mysqli_stmt_execute($requetePrepare);
                     
                    mysqli_stmt_bind_result($requetePrepare, $ColNom, $ColPrenom, $CliNom, $CliPrenom, $adresseDeDepart , $adresseArrivée , $dateDeDepart , $HeureDeDepart , $IDrdvChauffeur , $IDcollaborateurs);
                    
                   while (mysqli_stmt_fetch($requetePrepare)){
                    ?>
                    <tr class=liste2>
                            <td><?php echo $CliNom; ?></td>

                            <td><?php echo $CliPrenom; ?></td>

                            <td><?php echo $adresseDeDepart; ?></td>

                            <td><?php echo $adresseArrivée; ?></td>                          

                            <td><?php echo $dateDeDepart; ?></td>

                            <td><?php echo $HeureDeDepart; ?></td>

                            <td><?php echo $ColNom," ", $ColPrenom; ?></td>

                            <td><?php ChoixDuCollaborateurs($IDrdvChauffeur); ?></td>

                            <td><button><a id="<?php echo $IDrdvChauffeur ?>" href="index.php?page=validation_collaborateurs_chauffeur&IDrdvChauffeur=<?php echo $IDrdvChauffeur ?>">valider</a></button></td>
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


