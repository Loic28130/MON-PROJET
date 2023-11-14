<div id="onglets">
    <button class="ongletvert"><a href="index.php?page=liste_clients_admin"><-retour</a></button>
</div>

<section id="Contenu">

    <!-- tableau d'affichage de $result -->
    <table class=liste>
        <thead>
            <tr class=liste1>
                <td>adresse de depart</td>
                <td>adresse d'arrivée</td>
                <td>date de depart</td>
                <td>heure de depart</td>
                <td>paiement</td> 
            </tr>
        </thead>
        
        <tbody>
            <?php $connect = connectionBDD();
                $IDclients=$_GET ["IDclient"];
                $requete="SELECT adresse_de_depart , adresse_arrivee, date_de_depart , heure_de_depart , p.prix , rdv.ID_clients  FROM rdv_chauffeur as rdv
                LEFT JOIN paiement as p on rdv.ID_RDV_chauffeur=p.ID_RDV_chauffeur
                 WHERE ID_clients = $IDclients
                 ORDER BY date_de_depart DESC";

                if($requetePrepare = mysqli_prepare($connect,$requete)){
                    
                    // mysqli_stmt_bind_param($requetePrepare,);
                    
                    mysqli_stmt_execute($requetePrepare);
                     
                    mysqli_stmt_bind_result($requetePrepare, $adresseDeDepart , $adresseArrivée , $dateDeDepart , $HeureDeDepart , $prix , $IDrdvClients);
                    
                   while (mysqli_stmt_fetch($requetePrepare)){
                    ?>
                    <tr class=liste2>

                            <td><?php echo $adresseDeDepart; ?></td>

                            <td><?php echo $adresseArrivée; ?></td>                          

                            <td><?php echo $dateDeDepart; ?></td>

                            <td><?php echo $HeureDeDepart; ?></td>

                            <td><?php echo $prix; ?></td>


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


