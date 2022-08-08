
<body>

    <div id="onglets">
        <button class="ongletblanc"><a href="index.php?page=prise_RDV_chauffeur">chauffeur</a></button>
        <button class="ongletvert"><a href="index.php?page=prise_RDV_livreur">livreur</a></button>
    </div>

    <form action="index.php?page=livreur" method="post" class="formulaire">
        <label for="adresse_de recuperation">adresse de récuperation</label>
        <input type="text" name="recuperation" required autofocus>

        <label for="adresse_de_livraison">adresse de livraison</label>
        <input type="text" name="destination" required>

        <label for="date_de_recuperation">date de recuperation</label>
        <input type="date" name="date_de_recuperation" required>

        <input type="hidden" value="<?php echo $_SESSION["ID"]; ?>" name="ID" >

        <center><button class="bouton">valider</button></center>
    </form>
    
</body>
