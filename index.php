<!DOCTYPE html>
<html>
<body>

<?php

// Connexion et sélection de la base
$mysqli = new mysqli('remotemysql.com', 'qgO0M364Or', '7Hyomgetg3','qgO0M364Or');
/* Vérifie la connexion */
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", mysqli_connect_error());
    exit();
}
// Exécution des requêtes SQL
$query = "SELECT nom, url FROM Prestataire";
if ($stmt = $mysqli->prepare($query)) {

    /* Exécution de la requête */
    $stmt->execute();

    /* Association des variables de résultat */
    $stmt->bind_result($nom, $url);

    /* Lecture des valeurs */
    while ($stmt->fetch()) {
        printf ("<div> %s <br/><img src='%s'/></div>", $nom, $url);
    }

    /* Fermeture de la commande */
    $stmt->close();
}
/* Fermeture de la connexion */
$mysqli->close();
?>

</body>
</html>