

<section id="Contenu">

    <!-- tableau d'affichage de $result -->
    <table class=liste>
        <thead>
            <tr class=liste1>
                <td>adresse de recuperation</td>
                <td>adresse de livraison</td>
                <td>date de livraison</td> 
            </tr>
        </thead>
        
        <tbody>
            <?php $connect = connectionBDD();
                $IDclients=$_GET ["IDclient"];
                $requete="SELECT adresse_de_recuperation , adresse_de_livraison, date_de_livraison , rdv.ID_RDV_livreur  FROM rdv_livreur as rdv
                WHERE ID_clients = $IDclients
                ORDER BY date_de_livraison DESC";

                if($requetePrepare = mysqli_prepare($connect,$requete)){
                    
                    // mysqli_stmt_bind_param($requetePrepare,);
                    
                    mysqli_stmt_execute($requetePrepare);
                     
                    mysqli_stmt_bind_result($requetePrepare, $adresseDerecuperation , $adresseDeLivraison , $dateDeDeLivraison , $IDrdvClients);
                    
                   while (mysqli_stmt_fetch($requetePrepare)){
                    ?>
                    <tr class=liste2>

                            <td><?php echo $adresseDerecuperation; ?></td>

                            <td><?php echo $adresseDeLivraison; ?></td>                          

                            <td><?php echo $dateDeDeLivraison; ?></td>

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


