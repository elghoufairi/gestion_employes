<?php
// Connexion à la base de données
$serveur = "localhost";
$utilisateur = "root";
$mot_de_passe = "";
$base_de_donnees = "entreprise";

$connexion = mysqli_connect($serveur, $utilisateur, $mot_de_passe, $base_de_donnees);

// Vérification de la connexion
if (!$connexion) {
	die("La connexion à la base de données a échoué : " . mysqli_connect_error());
}

// Récupération des données envoyées par le formulaire

$employee_Cni = $_POST['employee_Cni'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$nom_arbe = $_POST['nom_arbe'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$date_recutement = $_POST['date_recutement'];
$date_naissance = $_POST['date_naissance'];
$echelle = $_POST['echelle'];
$echellon = $_POST['echellon'];
$regine_pension = $_POST['regine_pension'];
$stu_fam = $_POST['stu_fam'];
$nbre_enfant = $_POST['nbre_enfant'];
$categorie = $_POST['categorie'];
$service_id = $_POST['service_id'];

// Insertion des données dans la base de données
$insertion = "INSERT INTO employees ( employee_Cni, nom, prenom, nom_arbe, email, phone_number, date_recutement, date_naissance, echelle, echellon, regine_pension, stu_fam, nbre_enfant, categorie, service_id) VALUES ('$employee_Cni', '$nom', '$prenom', '$nom_arbe', '$email', '$phone_number', '$date_recutement', '$date_naissance', '$echelle', '$echellon', '$regine_pension', '$stu_fam', '$nbre_enfant', '$categorie', '$service_id')";

if (mysqli_query($connexion, $insertion)) {
	echo "<script>";
	echo "alert('Les données ont été ajoutées avec succès à la base de données.');";
	echo "</script>";
} else {
	echo "Erreur : " . $insertion . "<br>" . mysqli_error($connexion);
}

// Fermeture de la connexion à la base de données
mysqli_close($connexion);
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <style>
      /* navbar style */

nav {
    display: flex;
    margin-top: 0;
    overflow: hidden;
    border-radius: 20px;
    text-decoration: none;
}

nav ul {
    margin: 0;
    padding: 0;
    list-style: none;
    display: flex;
    margin-left: 200px;
}

nav li {
    float: left;
}

nav ul li a {
    display: block;
    margin-left: 80px;
    text-align: center;
    padding: 14px 16px;
    color: black;
    text-decoration: none;
}

nav a:hover {
    background-color: #ddd;
    color: black;
    text-decoration: none;
}

.logo {
    width: 120px;
    height: 50px;
}
body{
 
    margin: 0;
    padding: 0;

}
    </style>
</head>
<nav>
<img src="img/logo.png" class="logo">
  <ul>
    <li><a href="ajouter.php">Ajouter un employé</a></li>
    <li><a href="search.php">certifica</a></li>
    <li><a href="index.php">Liste des employés</a></li>
  </ul>
</nav>	
<script>
    function indo (){
    window.location.href="index.php";

}window.onload = function() {
        indo();
        }
</script>																																																																																																																																																																																																																																								</a></button>

	

