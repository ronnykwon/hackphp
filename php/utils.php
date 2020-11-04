<?php

function GetConnection() {
    // Connexion et sélection de la base
    $mysqli = new mysqli('remotemysql.com', 'qgO0M364Or', '7Hyomgetg3','qgO0M364Or');
    /* Vérifie la connexion */
    if (mysqli_connect_errno()) {
        printf("Échec de la connexion : %s\n", mysqli_connect_error());
        exit();
    }

    return $mysqli;
}

function GetAllPrestataire() {
    $mysqli = GetConnection();
    $query = "SELECT nom, url, description FROM Prestataire";

    if ($stmt = $mysqli->prepare($query)) {

        /* Exécution de la requête */
        $stmt->execute();
    
        /* Association des variables de résultat */
        $stmt->bind_result($nom, $url, $description);
    }
    
    return $stmt-> fetch_array();
}

?>