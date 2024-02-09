<?php
// Retrieve the employee ID from the URL parameter
$id = $_GET['id'];

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "entreprise";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the employee information from the database
$sql = "SELECT * FROM employees WHERE employee_Cnt=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Retrieve the updated information from the form
  $nom = $_POST["nom"];
  $prenom = $_POST["prenom"];
  $nom_arbe = $_POST["nom_arbe"];
  $employee_Cni = $_POST["employee_Cni"];
  $email = $_POST["email"];
  $phone_number = $_POST["phone_number"];
  $date_recutement = $_POST["date_recutement"];
  $date_naissance = $_POST["date_naissance"];
  $echelle = $_POST["echelle"];
  $echellon = $_POST["echellon"];
  $regine_pension = $_POST["regine_pension"];
  $stu_fam = $_POST["stu_fam"];
  $nbre_enfant = $_POST["nbre_enfant"];
  $categorie = $_POST["categorie"];
  $service_id = $_POST["service_id"];

  // Update the employee information in the database
  $sql = "UPDATE employees SET nom='$nom', prenom='$prenom', nom_arbe='$nom_arbe', employee_Cni='$employee_Cni', email='$email', phone_number='$phone_number', date_recutement='$date_recutement', date_naissance='$date_naissance', echelle='$echelle', echellon='$echellon', regine_pension='$regine_pension', stu_fam='$stu_fam', nbre_enfant='$nbre_enfant', categorie='$categorie', service_id='$service_id' WHERE employee_Cnt=$id";
  mysqli_query($conn, $sql);

  // Redirect back to the employee list page
  header("Location: index.php");
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Modifier Employé</title>
  <link rel="stylesheet" href="style.css">
  <style>
      /* navbar style */
body{
    background: linear-gradient( orange,rgb(55, 55, 175))no-repeat;
    margin: 0;
    padding: 0;

}
nav {
    display: flex;
    margin: 0;
    overflow: hidden;
    text-decoration: none;
    /* background: ; */
    padding-top:8px ;
    padding-bottom:8px ;
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
    padding-right:35px;
    /* padding-top:8px ;
    padding-bottom:8px ; */
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
    transition: 0,3s;
}

.logo {
    width: 120px;
    height: 50px;
    border-radius: 20px;
}
    </style>
</head>
<body>
<nav>
<img src="img/logo.png" class="logo">
  <ul>
    <li><a href="ajouter.php">AJOUTER UN EMPLOYES</a></li>
    <li><a href="search.php">CERTIFICAT</a></li>
    <li><a href="index.php">LISTE DES EMPLOYES</a></li>
  </ul>
</nav>
  <h2>Modifier Employé</h2>
  
  <form method="post">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" value="<?php echo $row["nom"]; ?>"><br>

    <label for="prenom">Prénom:</label>
    <input type="text" name="prenom" value="<?php echo $row["prenom"]; ?>"><br>

    <label for="nom_arbe">Nom Arabe:</label>
    <input type="text" name="nom_arbe" value="<?php echo $row["nom_arbe"]; ?>"><br>

    <label for="employee_Cni">CNI:</label>
    <input type="text" name="employee_Cni" value="<?php echo $row["employee_Cni"]; ?>"><br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $row["email"]; ?>"><br>

    <label for="phone_number">Téléphone:</label>
    <input type="text" name="phone_number" value="<?php echo $row["phone_number"]; ?>"><br>


    <label for="date_recutement">Date de recrutement:</label>
<input type="date" name="date_recutement" value="<?php echo $row["date_recutement"]; ?>"><br>

<label for="date_naissance">Date de naissance:</label>
<input type="date" name="date_naissance" value="<?php echo $row["date_naissance"]; ?>"><br>

<label for="echelle">Échelle:</label>
<input type="text" name="echelle" value="<?php echo $row["echelle"]; ?>"><br>

<label for="echellon">Échelon:</label>
<input type="text" name="echellon" value="<?php echo $row["echellon"]; ?>"><br>

<label for="regine_pension">Régime de pension:</label>
<input type="text" name="regine_pension" value="<?php echo $row["regine_pension"]; ?>"><br>

<label for="stu_fam">Situation familiale:</label>
<input type="text" name="stu_fam" value="<?php echo $row["stu_fam"]; ?>"><br>

<label for="nbre_enfant">Nombre d'enfants:</label>
<input type="number" name="nbre_enfant" value="<?php echo $row["nbre_enfant"]; ?>"><br>

<label for="categorie">Catégorie:</label>
<input type="text" name="categorie" value="<?php echo $row["categorie"]; ?>"><br>

<label for="service_id">Service:</label>

<input type="text" name="service_id" value="<?php echo $row["service_id"]; ?>"><br>
  <?php
    // Retrieve the list of services from the database
    // $sql = "SELECT * FROM services";
    // $result = mysqli_query($conn, $sql);

    // Loop through each service and display it as an option in the dropdown menu
//     while ($service = mysqli_fetch_assoc($result)) {
//       $selected = ($service['id'] == $row['service_id']) ? 'selected' : '';
//       echo "<option value='" . $service['id'] . "' " . $selected . ">" . $service['nom'] . "</option>";
//     }
//   ?>
<br>

<input type="submit" value="Enregistrer">
