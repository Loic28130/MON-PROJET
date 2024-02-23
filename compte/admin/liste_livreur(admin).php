
<div id="onglets">
    <button class="ongletblanc"><a href="index.php?page=liste_chauffeur_admin">chauffeur</a></button>
    <button class="ongletvert"><a href="index.php?page=liste_livreur_admin">livreur</a></button>
</div>
<section id="Contenu">

    <!-- tableau d'affichage de $result -->
    <table class=liste>
        <thead>
            <tr class=liste1>
                <td>Nom</td>
                <td>Prenom</td>
                <td>adresse de recuperation</td>
                <td>adresse de livraison</td>
                <td>date de livraison</td>
                <td>collaborateur</td>
                <td>choix du collaborateur</td> 
            </tr>
        </thead>
        
        <tbody>
            <?php $connect = connectionBDD();
            // var_dump()
                // $SelectID=$_SESSION["ID"];
                $requete="SELECT col.nom , col.prenom , cli.nom , cli.prenom , adresse_de_recuperation , adresse_de_livraison, date_de_livraison , rdv.ID_RDV_livreur  FROM rdv_livreur as rdv
                 INNER JOIN clients as cli on rdv.ID_clients=cli.ID_clients
                 LEFT JOIN collaborateurs as col on rdv.ID_collaborateurs=col.ID_collaborateurs
                 ORDER BY date_de_livraison DESC";

                if($requetePrepare = mysqli_prepare($connect, $requete)){
                    
                    // mysqli_stmt_bind_param($requetePrepare,);
                    
                    mysqli_stmt_execute($requetePrepare);
                     
                    mysqli_stmt_bind_result($requetePrepare, $ColNom, $ColPrenom, $CliNom, $CliPrenom, $adresseDeRecuperation, $adresseDeLivraison, $dateDeLivraison, $IDrdvLivreur);
                    
                   while (mysqli_stmt_fetch($requetePrepare)){
                    ?>
                    <tr class=liste2>
                            <td><?php echo $CliNom; ?></td>

                            <td><?php echo $CliPrenom; ?></td>

                            <td><?php echo $adresseDeRecuperation; ?></td>

                            <td><?php echo $adresseDeLivraison; ?></td>                          

                            <td><?php echo $dateDeLivraison; ?></td>

                            <td><?php echo $ColNom," ", $ColPrenom; ?></td>

                            <td><?php ChoixDuCollaborateurs($IDrdvLivreur, "'index.php?page=validation_collaborateurs_livreur&IDrdvLivreur=". $IDrdvLivreur."'") ?></td>

                            <td><button><a id="<?php echo $IDrdvLivreur ?>" href="index.php?page=validation_collaborateurs_livreur&IDrdvLivreur=<?php echo $IDrdvLivreur ?>">valider</a></button></td>

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


