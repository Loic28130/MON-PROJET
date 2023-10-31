<?php $connect = mysqli_connect ("localhost","root","","monprojet");
    if (mysqli_connect_errno()) {
       echo "erreur" . mysqli_connect_error();
       exit(); 
    }

        $requete = "SELECT ID_collaborateurs , nom , prenom FROM `collaborateurs` ORDER BY `ID_collaborateurs`"; // Ta requette
    $resultat = mysqli_query($connect,$requete);  // Traitement de la requete
    
    echo 'collaborateurs : <select name="collaborateurs">'; // Ton sélect
    
    while ($donnees = mysqli_fetch_array($resultat)) { // Boucle qui permet d'afficher tout les utilisateurs 
    
    $collaborateur = $donnees['ID_collaborateurs'] ; // Là tu récupère les données que tu souhaite comparer
    $nom = $donnees['nom'] ;
    $prenom = $donnees['prenom'] ; // Même chose
    
        if ($collaborateur == $nom) { // Ta comparaison à toi de la choisir
            
                        echo ' <option value="'.$collaborateur.'" selected="selected">'.$nom,$prenom.'</option>  ';  // Tu ajoute donc selected="selected" si ta comparaison est vrai (ou fausse)
                        
            }
            else
            {
            
                        echo '<option value="'.$collaborateur.'" >'.$nom,$prenom.'</option>'; // Tu n'ajoute rien si la comparaison est fausse (ou vrai)
    
        }
    
    }
    echo'</select></td>';
?>