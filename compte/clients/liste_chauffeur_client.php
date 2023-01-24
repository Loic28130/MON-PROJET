
        <section id="Contenu">

<!-- tableau d'affichage de $result -->
    <table class=liste>
        <thead>
            <tr class=liste1>
                <td>lieux de départ</td>
                <td>adresse d'arrivée</td>
                <td>date de départ</td>
                <td>heure de départ</td>
                
            </tr>
        </thead>
        <tbody>
            <?php $connect = connectionBDD();

                $SelectID=$_SESSION["ID"];
                $requete="SELECT  adresse_de_depart , adresse_arrivee , date_de_depart , heure_de_depart  FROM `rdv_chauffeur` 
                 WHERE `ID_clients` =?" ;

                if($requetePrepare = mysqli_prepare($connect, $requete)){
                    // bind mes valeur avec les ?
                    mysqli_stmt_bind_param($requetePrepare, "s", $SelectID);
                    // execution de la requete prepare
                    mysqli_stmt_execute($requetePrepare);
                    // association de la valeur de la colonne id_clients à la variable $id
                    // $row['id_clients']
                    mysqli_stmt_bind_result($requetePrepare, $adresseDeDepart, $adresseArrivee, $dateDeDepart, $heureDeDepart);
                    // recuperation des valeurs
                   while (mysqli_stmt_fetch($requetePrepare)){
                    ?>
                    <tr class=liste2>

                            <td><?php echo $adresseDeDepart; ?></td>

                            <td><?php echo $adresseArrivee; ?></td>

                            <td><?php echo $dateDeDepart; ?></td>

                            <td><?php echo $heureDeDepart; ?></td>
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


