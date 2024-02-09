<!DOCTYPE html>
<html>

<head>
    <title>Attestation de travail</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* Center the text in the div */
        
        div {
            text-align: center;
        }
        /* Style the table */
        
        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }
        /* Style the table cells */
        
        td,
        th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }
        /* Style the table header cells */
        
        th {
            background-color: #dddddd;
        }
        
    .div1 {
      border: 2px solid black;
      width: 300px;
      padding: 2px;
      margin-left:210px;
    }

    .div2 {
      border: 2px solid black;
      width: 295px;
    }

    .div2 h2 {
        text-align: center;
    }
    .n0{
        margin-right:500px;
    }
    .n1{
        margin-left:300px;
    }
    </style>
</head>

<body>
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
         
     

        // Ajouter d'autres champs d'informations selon la structure de votre base de données
    } else {
        echo "Aucun employé trouvé avec ce numéro d'identité.";
    }
}

// Fermer la connexion à la base de données
mysqli_close($conn);

?>
<head>
    <style>
        td {
            width: 80%;
            padding-top: 50px;
        }
        <head>
   
        table {
         
            height: 90%;
            
        }
    </style>
</head>
   

    <div style="text-align: center;">
      
        <p class="n0">N° : .../SS/2023</p>
        <p class="n1">Béni-Mellal le :</p>
        <br><br>
        <div class="div1">
  <div class="div2">
    <h2 >Attestation de travail</h2>
  </div>
</div>
    
    </div><br><br><br><br><br><br>
    
    <table>
        <tr>
            <td><strong>Nom et prénom :</strong></td>
            <td><?php echo $row['nom']." ".$row['prenom']; ?></td>
        </tr>
        <tr>
            <td><strong>Catégorie :</strong></td>
            <td><?php echo $row["categorie"] ?></td>
        </tr>
        <tr>
            <td><strong>Matricule :</strong></td>
            <td><?php echo $row["employee_Cnt"] ; ?></td>
        </tr>
        <tr>
            <td><strong>CNI :</strong></td>
            <td><?php echo $row["employee_Cni"]; ?></td>
        </tr>
        <tr>
            <td><strong>Date de recrutement :</strong></td>
            <td><?php echo  $row["date_recutement"]; ?></td>
        </tr>
        <tr>
            <td><strong>Exerce actuellement ses fonctions au Service Support du Bloc Foncier de Beni-Mellal.</strong></td>
            <td></td>
        </tr>
    </table><br><br>

    <p>La présente attestation est délivrée à l'intéressé(e) pour servir et valoir ce que de droit.</p>

    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.min.js"></script>
    <script>
        function printAndSaveAsPDF() {
            // Call the print function
            window.print();

            // Save the page as a PDF
            const doc = new jsPDF();
            doc.html(document.body, {
                callback: function() {
                    doc.save('attestation.pdf');
                }
            });
            // Trigger the function on page load
   
        }
        window.onload = function() {
        printAndSaveAsPDF();
    }
    </script>
    <?php
    // SELECT * FROM employees WHERE employee_Cnt = 'votre_identifiant_d_employé';

    
    ?>
</body>

</html>