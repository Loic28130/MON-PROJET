<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php include ("./structure/en-tete.php");?>

    <form action="" method="post">
        <label for="nom">nom</label>
        <input type="text" name="nom" required>

        <label for="prenom">prénom</label>
        <input type="text" name="prenom" required>

        <label for="email">adresse mail</label>
        <input type="email" name="email" required>

        <label for="password">mot de passe</label>
        <input type="password" name="password" required>

       <button type="submit">valider</button>
    </form>


    
</body>
</html>