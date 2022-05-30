
<body>

    <div id="onglets">
        <button class="ongletblanc"><a href="index.php?page=chauffeur">chauffeur</a></button>
        <button class="ongletvert"><a href="index.php?page=livreur">livreur</a></button>
    </div>

    <form action="index.php?page=" method="post" class="formulaire">
        <label for="recuperation">récuperation</label>
        <input type="text" name="recuperation" required>

        <label for="destination">destination</label>
        <input type="text" name="destination" required>

        <center><button class="bouton">valider</button></center>
    </form>
    
</body>
