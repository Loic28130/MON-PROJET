
<body>

    <div id="onglets">
        <button class="ongletvert"><a href="index.php?page=chauffeur">chauffeur</a></button>
        <button class="ongletblanc"><a href="index.php?page=livreur">livreur</a></button>
    </div>

    <form action="index.php?page=" method="post" class="formulaire">
        <label for="depart">départ</label>
        <input type="text" name="depart" required>

        <label for="arrivee">arrivée</label>
        <input type="text" name="arrivee" required>

        <center><button class="bouton">valider</button></center>
    </form>
    
</body>
