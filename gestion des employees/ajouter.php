<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

/* .logo {
    width: 120px;
    height: 50px;
    border-radius: 20px;
} */
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




    <form method="POST" action="insert.php">
        <label for="employee_Cni">Employee CNI:</label>
        <input type="text" id="employee_Cni" name="employee_Cni" required><br>

        <label for="nom">Nom:</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom:</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="nom_arbe">Nom en arabe:</label>
        <input type="text" id="nom_arbe" name="nom_arbe"dir="rtl" lang="ar" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="phone_number">Numéro de téléphone:</label>
        <input type="text" id="phone_number" name="phone_number"><br>

        <label for="date_recutement">Date de recrutement:</label>
        <input type="date" id="date_recutement" name="date_recutement" required><br>

        <label for="date_naissance">Date de naissance:</label>
        <input type="date" id="date_naissance" name="date_naissance" required><br>

        <label for="echelle">Echelle:</label>
        <input type="text" id="echelle" name="echelle" required><br>

        <label for="echellon">Echellon:</label>
        <input type="text" id="echellon" name="echellon" required><br>

        <label for="regine_pension">Régime de pension:</label>
        <input type="text" id="regine_pension" name="regine_pension" required><br>

        <label for="stu_fam">Statut familial:</label>
        <input type="text" id="stu_fam" name="stu_fam" required><br>

        <label for="nbre_enfant">Nombre d'enfants:</label>
        <input type="text" id="nbre_enfant" name="nbre_enfant"><br>

        <label for="categorie">Catégorie:</label>
        <input type="text" id="categorie" name="categorie" required><br>

        <label for="service_id">ID de service:</label>
        <input type="text" id="service_id" name="service_id" required><br>

        <input type="submit" value="ajouter">
    </form>


</body>

</html>