
<body>

    <div id="onglets">
        <button class="ongletvert"><a href="index.php?page=chauffeur">chauffeur</a></button>
        <button class="ongletblanc"><a href="index.php?page=livreur">livreur</a></button>
    </div>

    <form action="index.php?page=prise_RDV" method="post" class="formulaire">
        <label for="lieux_de_depart">lieux de départ</label>
        <input type="text" name="lieux_de_depart" required autofocus>

        <label for="adresse_arrivee">adresse d'arrivée</label>
        <input type="text" name="adresse_arrivee" required>

        <label for="date_de_depart">date de départ</label>
        <input type="date" name="date_de_depart" required>

        <label for="heure_de_depart">heure de départ</label>
        <input type="Time" name="heure_de_depart" required>

        <center><button class="bouton">valider</button></center>
    </form>
    
</body>
