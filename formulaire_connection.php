
<body>

<form action="index.php?page=connect" method="post" class="formulaire">

    <label for="email">email</label>
    <input type="email" name="email" required autofocus>
    

    <label for="mot_de_passe">mot de passe</label>
    <input type="password" name="mot_de_passe" required>

    <input type="hidden" name="type" value="<?php echo $_GET["type"];?>"

    <center><button class="bouton">valider</button></center>
</form>
    
</body>
