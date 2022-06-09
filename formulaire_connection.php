
<body>
    
<form action="index.php?page=connect" method="post" class="formulaire">

    <label for="email">email</label>
    <input type="email" name="email" required>
    

    <label for="mot_de_passe">mot de passe</label>
    <input type="password" name="mot_de_passe" required>

    <?php
        echo ($_SESSION['success']);
        echo ($_SESSION['danger']);
    ?>

    <center><button class="bouton">valider</button></center>
</form>
    
</body>
