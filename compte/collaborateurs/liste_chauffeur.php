
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
                
            </tr>
        </thead>
        <tbody>
            <?php $connect = connectionBDD();

                $SelectID=$_SESSION["ID"];
                $requete="SELECT cli.nom , cli.prenom , adresse_de_depart , adresse_arrivee , date_de_depart , heure_de_depart  FROM `rdv_chauffeur` as rdv
                INNER JOIN clients as cli on rdv.ID_clients=cli.ID_clients
                 WHERE `ID_collaborateurs` =?" ;

                if($requetePrepare = mysqli_prepare($connect, $requete)){
                    // bind mes valeur avec les ?
                    mysqli_stmt_bind_param($requetePrepare, "s", $SelectID);
                    // execution de la requete prepare
                    mysqli_stmt_execute($requetePrepare);
                    // association de la valeur de la colonne id_clients à la variable $id
                    // $row['id_clients']
                    mysqli_stmt_bind_result($requetePrepare, $nom, $prenom, $adresseDeDepart, $adresseArrivee, $dateDeDepart, $heureDeDepart);
                    // recuperation des valeurs
                    mysqli_stmt_fetch($requetePrepare);
                }
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
            mysqli_close($connect);
            ?>
        </tbody>
    </table>

</section>


