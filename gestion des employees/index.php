<!DOCTYPE html>
<html>

<head>
    <title>Tableau des employés</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background-color: rgba(181, 181, 181, 0.932);
            margin: 0;
            padding: 0;
        }

        .container {
            margin: auto;
            width: 90%;
            max-width: 1200px;
            padding: 20px;
            border: none;
            margin-top: 100px;
            background-color: white;
            border-radius: 20px;
            /* background-color: rgba(181, 181, 181, 0.932); */


        }

        button {
            border: blue 1px;
            color: blue;
            background-color: white;
        }

        h2 {
            font-size: 28px;
            text-align: center;
            margin-bottom: 30px;
            color: #444;
        }

        .table-responsive {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: white;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border: black solid 1px;
            /* background-color: white; */
        }

        th {
            /* background-color: #196fdf; */
            color: black;
            border: black solid 1px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        td:nth-child(1) {
            font-weight: bold;
        }

        td:nth-child(5) {
            font-style: italic;
        }

        td:nth-child(7) {
            font-weight: bold;
        }

        td:nth-child(9) {
            font-style: italic;
        }

        td:nth-child(10) {
            font-weight: bold;
        }

        td:nth-child(12) {
            font-style: italic;
        }

        td:nth-child(13) {
            font-weight: bold;
        }

        td:nth-child(15) {
            font-style: italic;
        }

        td:nth-child(16) {
            font-weight: bold;
        }

        .logo {
            width: 120px;
            height: 50px;
        }

        button {
            border: blue 1px;
            color: red;
            background: transparent;

        }

        .btn2 {
            background-color: red;
            color: black;
            border-radius: 5px;
            font-family: bold;
            border: none;
        }

        .btnAjouter {
            background-color: #196fdf;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 2px 0px #156785;
            margin-top: 30px;


        }

        .btnAjouter a {
            color: black;
            text-decoration: none;
            font-family: bold;

        }

        .titre2 {
            /* background-color: #196fdf; */
            border-radius: 20px;


        }




        /* navbar style */
        body {
            background: linear-gradient(orange, rgb(55, 55, 175))no-repeat;
          height:100vh;

        }

        nav {
            display: flex;
            margin: 0;
            overflow: hidden;
            text-decoration: none;
            /* background: ; */
            padding-top: 8px;
            padding-bottom: 8px;
            position: fixed;
            top: 0;
            background-color: rgba(17, 17, 194);
        
            width: 100%
        }

        nav ul {
            margin: 0;
            padding: 0;
            list-style: none;
            display: flex;
            margin-left: 130px;
            text-decoration: none;
            padding-right: 35px;
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
            transition: 0, 3s;
        }

        .logo {
            width: 120px;
            height: 50px;
            border-radius: 20px;
        }
    </style>
</head>

<body>
    <button style=" border: blue 1px;"></button>
    <?php

    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "entreprise";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Vérifier la connexion
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Requête SQL pour récupérer toutes les données de la table "employees"
    $sql = "SELECT * FROM employees";

    $result = mysqli_query($conn, $sql);
    // Si un numéro d'identité est soumis via la méthode POST, exécuter la recherche

    ?>
    <nav>
        <img src="img/logo.png" class="logo">
        <ul>
            <li><a href="ajouter.php">AJOUTER UN EMPLOYES</a></li>
            <li><a href="search.php">CERTIFICAT</a></li>
            <li><a href="index.php">LISTE DES EMPLOYES</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2 class="titre2">Tableau des employés</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Nom Arabe</th>
                        <th>CNI</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Date de recrutement</th>
                        <th>Date de naissance</th>
                        <th>Echelle</th>
                        <th>Echelon</th>
                        <th>Régime de pension</th>
                        <th>Situation familiale</th>
                        <th>Nombre d'enfants</th>
                        <th>Catégorie</th>
                        <th>ID du service</th>
                        <th>modifier</th>
                        <th>supprimer</th>

                       
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // boucle sur les employés
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["employee_Cnt"] . "</td>";
                        echo "<td>" . $row["nom"] . "</td>";
                        echo "<td>" . $row["prenom"] . "</td>";
                        echo "<td>" . $row["nom_arbe"] . "</td>";
                        echo "<td>" . $row["employee_Cni"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["phone_number"] . "</td>";
                        echo "<td>" . $row["date_recutement"] . "</td>";
                        echo "<td>" . $row["date_naissance"] . "</td>";
                        echo "<td>" . $row["echelle"] . "</td>";
                        echo "<td>" . $row["echellon"] . "</td>";
                        echo "<td>" . $row["regine_pension"] . "</td>";
                        echo "<td>" . $row["stu_fam"] . "</td>";
                        echo "<td>" . $row["nbre_enfant"] . "</td>";
                        echo "<td>" . $row["categorie"] . "</td>";
                        echo "<td>" . $row["service_id"] . "</td>";
                        echo '<td><a href="modifier.php?id=' . $row["employee_Cnt"] . '"><button >modifier</button></a></td>';
                        echo '<td><a href="supprimer.php?id=' . $row["employee_Cnt"] . '"><button >supprimer</button></a></td>';


                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    </div>




    <!-- Inclusion des fichiers JavaScript de Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>

</html>