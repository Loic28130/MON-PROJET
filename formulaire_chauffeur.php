<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    
<form action="index.php?page=" method="post" class="formulaire">
    <label for="nom">nom</label>
    <input type="text" name="nom" required>

    <label for="prenom">prénom</label>
    <input type="text" name="prenom" required>

    <label for="email">email</label>
    <input type="email" name="email" required>

    <label for="mot_de_passe">mot de passe</label>
    <input type="password" name="mot_de_passe" required>

    <center><button class="bouton">valider</button></center>
</form>
    
</body>
</html>