<div id="onglets">
    <button class="ongletvert"><a href="index.php?page=liste_clients_admin"><-retour</a></button>
</div>

<section id="Contenu">

    <!-- tableau d'affichage de $result -->
    <table class=liste>
        <thead>
            <tr class=liste1>
                <td>adresse de recuperation</td>
                <td>adresse de livraison</td>
                <td>date de livraison</td>
                <td>paiement</td> 
            </tr>
        </thead>
        
        <tbody>
            <?php $connect = connectionBDD();
                $IDclients=$_GET ["IDclient"];
                $requete="SELECT adresse_de_recuperation , adresse_de_livraison, date_de_livraison , p.prix , rdv.ID_RDV_livreur  FROM rdv_livreur as rdv
                LEFT JOIN paiement as p on rdv.ID_RDV_livreur=p.ID_RDV_livreur
                WHERE ID_clients = $IDclients
                ORDER BY date_de_livraison DESC";

                if($requetePrepare = mysqli_prepare($connect,$requete)){
                    
                    // mysqli_stmt_bind_param($requetePrepare,);
                    
                    mysqli_stmt_execute($requetePrepare);
                     
                    mysqli_stmt_bind_result($requetePrepare, $adresseDerecuperation , $adresseDeLivraison , $dateDeDeLivraison , $prix , $IDrdvClients);
                    
                   while (mysqli_stmt_fetch($requetePrepare)){
                    ?>
                    <tr class=liste2>

                            <td><?php echo $adresseDerecuperation;?></td>

                            <td><?php echo $adresseDeLivraison;?></td>                          

                            <td><?php echo $dateDeDeLivraison;?></td>

                            <td><?php echo $prix;?></td>

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


