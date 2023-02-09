<div id="onglets">
        <button class="ongletblanc"><a href="index.php?page=liste_chauffeur">chauffeur</a></button>
        <button class="ongletvert"><a href="index.php?page=liste_livreur">livreur</a></button>
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
                <td>paiment</td>
                
            </tr>
        </thead>
        <tbody>
            <?php $connect = connectionBDD();

                $SelectID=$_SESSION["ID"];
                $requete="SELECT cli.nom , cli.prenom , adresse_de_recuperation , adresse_de_livraison , date_de_livraison, ID_RDV_livreur  FROM rdv_livreur as rdv
                INNER JOIN clients as cli on rdv.ID_clients=cli.ID_clients
                 WHERE `ID_collaborateurs` =?" ;

                if($requetePrepare = mysqli_prepare($connect, $requete)){
                    
                    mysqli_stmt_bind_param($requetePrepare, "s", $SelectID);
                    
                    mysqli_stmt_execute($requetePrepare);
                     
                    mysqli_stmt_bind_result($requetePrepare, $nom, $prenom, $adresseDeRecuperation, $adresseDeLivraison, $dateDeLivraison, $IDrdvLivreur);
                    
                   while (mysqli_stmt_fetch($requetePrepare)){
                    ?>
                    <tr class=liste2>
                            <td><?php echo $nom; ?></td>

                            <td><?php echo $prenom; ?></td>

                            <td><?php echo $adresseDeRecuperation; ?></td>

                            <td><?php echo $adresseDeLivraison; ?></td>                          

                            <td><?php echo $dateDeLivraison; ?></td>

                            <td><a href="index.php?page=paiement&IDrdvLivreur=<?php echo $IDrdvLivreur; ?>">valider le paiment</a></td>

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


