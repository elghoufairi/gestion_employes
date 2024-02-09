<?php
// Connexion à la base de données
$conn = mysqli_connect("localhost", "root", "", "entreprise");

// Vérification de la connexion
if (!$conn) {
    die("Échec de la connexion à la base de données : " . mysqli_connect_error());
}

// Récupération de l'id de l'employé à supprimer depuis l'URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    // Suppression de l'employé dans la base de données
    $sql = "DELETE FROM employees WHERE employee_Cnt = $id";
    if (mysqli_query($conn, $sql)) {
         echo "<script>";
	     echo "alert('Employé supprimé avec succès.');";
	     echo "</script>";
        
    } else {
        echo "Erreur lors de la suppression de l'employé : " . mysqli_error($conn);
    }
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Supprimer un employé</title>
</head>
<body>
<script>
    function indo (){
    window.location.href="index.php";

}window.onload = function() {
        indo();
        }
</script>	
</body>
</html>
