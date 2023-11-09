
<div id="onglets">
    <button class="ongletvert"><a href="index.php?page=historique_client_chauffeur_admin">chauffeur</a></button>
    <button class="ongletblanc"><a href="index.php?page=">livreur</a></button>
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
            </tr>
        </thead>
        
        <tbody>
            <?php $connect = connectionBDD();
                $IDclients=$_GET ["IDclient"];
                $requete="SELECT adresse_de_depart , adresse_arrivee, date_de_depart , heure_de_depart , rdv.ID_clients  FROM rdv_chauffeur as rdv
                 WHERE ID_clients = $IDclients
                 ORDER BY date_de_depart DESC";

                if($requetePrepare = mysqli_prepare($connect,$requete)){
                    
                    // mysqli_stmt_bind_param($requetePrepare,);
                    
                    mysqli_stmt_execute($requetePrepare);
                     
                    mysqli_stmt_bind_result($requetePrepare, $adresseDeDepart , $adresseArrivée , $dateDeDepart , $HeureDeDepart , $IDrdvClients);
                    
                   while (mysqli_stmt_fetch($requetePrepare)){
                    ?>
                    <tr class=liste2>

                            <td><?php echo $adresseDeDepart; ?></td>

                            <td><?php echo $adresseArrivée; ?></td>                          

                            <td><?php echo $dateDeDepart; ?></td>

                            <td><?php echo $HeureDeDepart; ?></td>

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


