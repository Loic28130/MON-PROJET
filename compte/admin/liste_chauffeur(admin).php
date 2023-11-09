
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
                <td>choix du collaborateur</td> 
            </tr>
        </thead>
        
        <tbody>
            <?php $connect = connectionBDD();
            // var_dump()
                // $SelectID=$_SESSION["ID"];
                $requete="SELECT cli.nom , cli.prenom , adresse_de_depart , adresse_arrivee, date_de_depart , heure_de_depart , rdv.ID_RDV_chauffeur FROM rdv_chauffeur as rdv
                 INNER JOIN clients as cli on rdv.ID_clients=cli.ID_clients
                 ORDER BY date_de_depart DESC";

                if($requetePrepare = mysqli_prepare($connect, $requete)){
                    
                    // mysqli_stmt_bind_param($requetePrepare,);
                    
                    mysqli_stmt_execute($requetePrepare);
                     
                    mysqli_stmt_bind_result($requetePrepare, $nom, $prenom, $adresseDeDepart , $adresseArrivée , $dateDeDepart , $HeureDeDepart , $IDrdvChauffeur);
                    
                   while (mysqli_stmt_fetch($requetePrepare)){
                    ?>
                    <tr class=liste2>
                            <td><?php echo $nom; ?></td>

                            <td><?php echo $prenom; ?></td>

                            <td><?php echo $adresseDeDepart; ?></td>

                            <td><?php echo $adresseArrivée; ?></td>                          

                            <td><?php echo $dateDeDepart; ?></td>

                            <td><?php echo $HeureDeDepart; ?></td>

                            <td><?php  ChoixDuCollaborateurs(); ?></td>
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


