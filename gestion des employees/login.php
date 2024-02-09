<?php
// Connexion à la base de données
$dbHost = "localhost"; // Adresse du serveur de base de données
$dbUsername = "root"; // Nom d'utilisateur de la base de données
$dbPassword = ""; // Mot de passe de la base de données
$dbName = "entreprise"; // Nom de la base de données

$conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Erreur de connexion à la base de données: " . mysqli_connect_error());
}   

// Récupérer les données soumises par le formulaire
$username = $_POST["username"];
$password = $_POST["password"];

// Vérifier les informations d'identification dans la base de données
$query = "SELECT * FROM utilisateurs WHERE nom_utilisateur = '$username' AND mot_de_passe = '$password'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) == 1) {
    // Informations d'identification valides, rediriger vers la page d'accueil
    header("Location: index.php");
    exit();
} else {
    // Informations d'identification invalides, afficher un message d'erreur
    echo "Nom d'utilisateur ou mot de passe incorrect.";
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
