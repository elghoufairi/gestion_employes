<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Demande d'attestation de salaire</title>
  <style>
    body {
      padding: 20px;
    }

    /* Style du formulaire */
    form {
      margin: 0 auto;
      padding: 20px;

    }

    label,
    input {
      display: block;
      margin-bottom: 10px;
    }

    input[type="submit"] {
      background-color: #007bff;
      color: #fff;
      padding: 10px;
      border: none;
      cursor: pointer;
    }

    /* Style pour la mise en page des signatures */
    .signatures {
      display: flex;
      justify-content: space-between;
    }

    .signature {
      padding-top: 20px;
    }

    img {
      margin-left: 250px;
      justify-content: center;
      width: 129px;
      height: 62px;
    }

    h1 {
      text-align: center;
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
  <form>
    <img src="img/logo.png">
    <h1>DEMANDE D'ATTESTATION DE SALAIRE</h1><br>
    <table>
    <tr>
        <td>
        <p for="nom_prenom">NOM ET PRENOM:</p>
        </td>
        <td>
        <span><?php echo "". $row['nom']." ".$row['prenom']; ?></span><br>
        </td>
    </tr>
    <tr>
        <td>
        <label for="categorie">CATEGORIE:</label>
        </td>
        <td><span><?php echo "". $row["categorie"] ; ?></span></td>
    </tr>
    <tr>
        <td>
        <label for="echelle">ECHELLE:</label>
        </td>
        <td><span><?php echo "". $row["echelle"] ; ?></span></td>
    </tr>
    <tr>
        <td>
        <label for="mle_cnt">Mle C.N.T:</label>
        </td>
        <td> <span><?php echo "". $row["employee_Cnt"] ; ?></span>
      </td>
    </tr>
   
        <td>
        <label for="cin">N° C.I.N:</label>
        </td>
        <td>
        <span><?php echo "".$row["employee_Cni"] ; ?></span>
        </td>
    </tr>
    <tr>
        <td>
        <label for="affectation">AFFECTATION:</label>
        </td>
        <td><span><?php echo "". $row['nom']." ".$row['prenom']; ?></span></td>
    </tr>
  
    <tr>
        <td>
        <p>INFORMATION SUR SALAIRE :</p>
        </td>
        <td>
        <input type="checkbox" >
        </td>
        
    </tr>
    <tr>
        <td>
        <p>ATTESTATION DE SALAIRE SIGNEE</p>
        </td>
        <td>
        <input type="checkbox" >
        </td>
        
    </tr>
    <tr>
        <td>
        <p>ATTESTATION DE PRECOMPTE (I.R) </p>
        </td>
        <td>
        <input type="checkbox" >
        </td>
        
    </tr>
    <tr>
        <td>
        <p> PERIODE:…….……………………………..</p>
        </td>
      
        
    </tr>
   

</table>
    
   
    <br>
    <br><br>
    <div class="signatures">
      <div class="signature">
        <label for="signature_chef">SIGNATURE DU CHEF DE SERVICE</label>
      </div>
      <div class="signature">
        <label for="signature_interesse">SIGNATURE DE L'INTERESSE</label>
      </div>
    </div>
  </form>
  <script>
    function printAndSaveAsPDF() {
      // Call the print function
      window.print();

      // Save the page as a PDF
      const doc = new jsPDF();
      doc.html(document.body, {
        callback: function () {
          doc.save('attestation.pdf');
        }
      });
      // Trigger the function on page load

    }
    window.onload = function () {
      printAndSaveAsPDF();
    }
  </script>
</body>


</html>