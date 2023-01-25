<div id="onglets">
        <button class="ongletblanc"><a href="index.php?page=liste_chauffeur_client">chauffeur</a></button>
        <button class="ongletvert"><a href="index.php?page=liste_livreur_client">livreur</a></button>
    </div>
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

$SelectID=$_SESSION["ID"];
$requete="SELECT  adresse_de_recuperation , adresse_de_livraison , date_de_livraison  FROM `rdv_livreur` 
 WHERE `ID_clients` =?" ;

if($requetePrepare = mysqli_prepare($connect, $requete)){
    // bind mes valeur avec les ?
    mysqli_stmt_bind_param($requetePrepare, "s", $SelectID);
    // execution de la requete prepare
    mysqli_stmt_execute($requetePrepare);
    // association de la valeur de la colonne id_clients à la variable $id
    // $row['id_clients']
    mysqli_stmt_bind_result($requetePrepare, $adresseDeRecuperation,  $adresseDeLivraison, $dateDeLivraison);
    // recuperation des valeurs
   while (mysqli_stmt_fetch($requetePrepare)){
    ?>
                    <tr class=liste2>
                            <td><?php echo $adresseDeRecuperation; ?></td>

                            <td><?php echo $adresseDeLivraison; ?></td>                          

                            <td><?php echo $dateDeLivraison; ?></td>

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