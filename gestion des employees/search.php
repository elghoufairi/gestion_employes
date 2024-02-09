<?php

// Établir une connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "entreprise";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("La connexion a échoué : " . mysqli_connect_error());
}


// Si un numéro d'identité est soumis via la méthode POST, exécuter la recherche
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employee_Cni = $_POST["employee_Cni"];

    // Échapper les caractères spéciaux pour éviter les attaques par injection SQL
    $employee_Cni = mysqli_real_escape_string($conn, $employee_Cni);

    // Exécuter la requête SQL pour rechercher l'employé par son numéro d'identité
    $sql = "SELECT * FROM employees WHERE employee_Cni = '$employee_Cni'";
    $result = mysqli_query($conn, $sql);

    // Si un employé est trouvé, afficher ses informations
    if (mysqli_num_rows($result) > 0) {
        
        $row = mysqli_fetch_assoc($result);
        echo "CNI: " . $row["employee_Cni"] . "<br>";
       
        // Ajouter d'autres champs d'informations selon la structure de votre base de données
    } else {
        echo "Aucun employé trouvé avec ce numéro d'identité.";
    }
}

// Fermer la connexion à la base de données
mysqli_close($conn);

?>
<head>
    <link rel="stylesheet" href="nav.css">
    <style>
      /* Reset default margin and padding for body */
body {
    margin: 0;
    padding: 0;
}

/* Set background color and height for body */
body {
    background: linear-gradient(orange, rgb(55, 55, 175)) no-repeat;
    height: 100vh;
}

/* Style for input[type="text"] */
input[type="text"] {
    padding: 10px;
    margin-bottom: 15px;
    border: black 5px;
    border-radius: 10px;
    font-size: 16px;
    width: 30%;
    background-color: rgb(190, 255, 233);
}

/* Styles for the form */
form {
    margin-top: 200px;
    text-align: center;
}

label {
    display: block;
    margin-bottom: 10px;
    font-size: 16px;
    font-weight: bold;
}

input[type="text"] {
    width: 300px;
    height: 30px;
    border: 2px solid #ccc;
    border-radius: 4px;
    padding: 4px 8px;
    font-size: 16px;
}

input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

/* Styles for the navbar */
nav {
    display: flex;
    margin: 0;
    overflow: hidden;
    text-decoration: none;
    padding-top: 8px;
    padding-bottom: 8px;
    position: fixed;
    top: 0;
    background-color: rgba(17, 17, 194);
    width: 100%;
}

nav ul {
    margin: 0;
    padding: 0;
    list-style: none;
    display: flex;
    margin-left: 130px;
    text-decoration: none;
    padding-right: 35px;
}

nav li {
    float: left;
}

nav ul li a {
    display: block;
    margin-left: 40px;
    text-align: center;
    padding: 14px 16px;
    color: black;
    text-decoration: none;
    font-size: 18px;
    font-family: sans-serif;
}

nav a:hover {
    background-color: rgb(190, 255, 233);
    color: black;
    text-decoration: none;
    border-radius: 20px;
    transition: 0.3s;
}

.logo {
    width: 120px;
    height: 50px;
    border-radius: 20px;
}

.titre2 {
    /* background-color: #196fdf; */
    border-radius: 20px;
}

.formi {
    display: flex;
    margin-left: 200px;
    padding: 50px;
}

.formi1 {
    margin-left: 200px;
}

 
    </style>
</head>
<nav>
<img src="img/logo.png" class="logo">
  <ul>
    <li><a href="ajouter.php">AJOUTER UN EMPLOYES</a></li>
    <li><a href="search.php">CERTIFICAT</a></li>
    <li><a href="index.php">LISTE DES EMPLOYES</a></li>
  </ul>
</nav>

<div class="formi">
  <!-- Formulaire HTML pour la saisie du numéro d'identité -->
 <form method="post" action="test.php">
     <h2 for="employee_Cni" class="titre2">Attestation de travail:</h2>
     <input type="text" id="employee_Cni" name="employee_Cni" placeholder="entrer employee_Cni "><br>
     <input style=" background-color: #196fdf;" type="submit" value="imprimer">
  </form>
 <form method="post" action="certi2.php"class="formi1">
    <h2 for="employee_Cni" class="titre2">DEMANDE D'ATTESTATION DE SALAIRE</h2>
     <input type="text" id="employee_Cni" name="employee_Cni" placeholder="entrer employee_Cni "><br>
    <input style=" background-color: #196fdf;" type="submit" value="imprimer">
  </form>
</div>n


