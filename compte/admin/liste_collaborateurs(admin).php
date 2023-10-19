<div id="onglets">
    <button class="ongletvert"><a href="index.php?page=liste_chauffeur_admin">ajout collaborateurs</a></button>
</div>

<section id="Contenu">

    <!-- tableau d'affichage de $result -->
    <table class=liste>
        <thead>
            <tr class=liste1>
                <td>Nom</td>
                <td>Prenom</td>
                <td>adresse mail</td>
            </tr>
        </thead>
        
        <tbody>
            <?php $connect = connectionBDD();
            // var_dump()
                // $SelectID=$_SESSION["ID"];
                $requete="SELECT nom , prenom , email FROM collaborateurs";

                if($requetePrepare = mysqli_prepare($connect, $requete)){
                    
                    // mysqli_stmt_bind_param($requetePrepare,);
                    
                    mysqli_stmt_execute($requetePrepare);
                     
                    mysqli_stmt_bind_result($requetePrepare, $nom, $prenom, $adresseMail);
                    
                   while (mysqli_stmt_fetch($requetePrepare)){
                    ?>
                    <tr class=liste2>
                            <td><?php echo $nom; ?></td>

                            <td><?php echo $prenom; ?></td>

                            <td><?php echo $adresseMail; ?></td>
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


