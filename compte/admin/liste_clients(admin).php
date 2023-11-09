

<section id="Contenu">

    <!-- tableau d'affichage de $result -->
    <table class=liste>
        <thead>
            <tr class=liste1>
                <td>Nom</td>
                <td>Prenom</td>
                <td>adresse mail</td>
                <td>historique</td>
            </tr>
        </thead>
        
        <tbody>
            <?php $connect = connectionBDD();
            // var_dump()
                // $SelectID=$_SESSION["ID"];
                $requete="SELECT ID_clients , nom , prenom , email FROM clients";

                if($requetePrepare = mysqli_prepare($connect, $requete)){
                    
                    // mysqli_stmt_bind_param($requetePrepare,);
                    
                    mysqli_stmt_execute($requetePrepare);
                     
                    mysqli_stmt_bind_result($requetePrepare , $IDclients , $nom, $prenom, $adresseMail);
                    
                   while (mysqli_stmt_fetch($requetePrepare)){
                    ?>
                    <tr class=liste2>
                            <td><?php echo $nom; ?></td>

                            <td><?php echo $prenom; ?></td>

                            <td><?php echo $adresseMail; ?></td>

                            <td><a href="index.php?page=historique_client_chauffeur_admin&IDclient=<?php echo $IDclients?>">visualiser</a></td>
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


