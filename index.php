<?php 
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
      die("La connexion a échoué : " . $conn->connect_error);
  }
  $sql = ("SELECT count(*) as total from form;");
  $res = $conn->query($sql);
  $data=mysqli_fetch_assoc($res);
  $numero = $data['total'] + 1;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Enregistrement dans la base de données</title>
</head>

<body>
    <nav>
        <h4>Numero : <span class="numero"><?php echo $numero; ?></span></h4>
        <button class="search" type="submit"  name="RechercherID" onclick="redirectToAnotherPage('research')">Rechercher 🔎</button>
    </nav>
    <br />
    <form method="post" action="php/tp7.php" enctype="multipart/form-data">
        <label for="civilite">Civilité:</label><br />
        <input type="radio" id="monsieur" name="civilite" value="Monsieur" checked />
        <b>Monsieur</b>
        <input type="radio" id="madame" name="civilite" value="Madame" />
        <b>Madame</b>
        <input type="radio" id="madamosile" name="civilite" value="Madamosile" />
        <b>Madamosile</b><br /><br />

        <label for="nom">Nom/Prénom :</label>
        <input type="text" id="nom" name="nom"  /><br /><br />

        <label for="adresse">Adresse :</label>
        <textarea id="adresse" name="adresse" cols="20" rows="1" ></textarea><br /><br />

        <label for="code_postal">Code Postal :</label>
        <input type="text" name="code_postal" id="code_postal" /><br /><br />

        <label for="localite">Localité :</label>
        <input type="text" name="localite" id="localite" /><br /><br />

        <label for="pays">Pays:</label>
        <select id="pays" name="pays">
            <option value="">--Veuillez choisir une langue--</option>
            <option value="alg">Algérie</option>
            <option value="fra">Français</option>
            <option value="bel">Belge</option>
            <option value="sui">Suisse</option>
            <option value="cha">Chainise</option>
        </select><br /><br />

        <label for="platforms">Plate-formes :</label><br />
        <input type="checkbox" name="platforms[]" value="Windows" /> Windows
        <input type="checkbox" name="platforms[]" value="Linux" /> Linux
        <input type="checkbox" name="platforms[]" value="Macintosh" />Macintosh<br /><br />

        <label for="applications">Applications :</label><br />
        <select id="applications" name="applications[]" multiple>
            <option value="Bureautique">Bureautique</option>
            <option value="DAO">DAO</option>
            <option value="Statistique">Statistique</option>
            <option value="SGBD">SGBD</option>
            <option value="Internet">Internet</option>
        </select><br /><br />
        <label for="D_N">Date de naissance :</label>
        <input type="date" name="D_N" id="D_N" /> <br /><br />
        <label for="D_R">Date de rendez-vous :</label>
        <input type="date" name="D_R" id="D_R" /> <br /><br />
        <label for="imageInput">Insérer la premiere Image :</label>
        <input type="file" id="imageInput" name="imageInput" /><br /><br />
        <img id="previewImage" alt="Image preview" style="display: none; max-width: 150px" /><br /><br />

        <label for="imageInput2">Insérer la deuxième Image :</label>
        <input type="file" id="imageInput2" name="imageInput2" /><br /><br />
        <img id="previewImage2" alt="Image preview" style="display: none; max-width: 150px" /><br /><br />

        <button type="submit" name="submit">Afficher PHP</button>
        <button type="button" onclick="afficherJavaScript()">Afficher JavaScript</button>
        <button type="submit" name="enregistrer">Enregistrer</button>
        <button type="submit" name="affichage_liste">Affichage Liste</button>
        <button type="submit" formaction="supprimer.html">Supprimer</button>
        <button type="submit" formaction="modifier.html">Modifier</button>
    </form>
    <script>
    var imageSrc = "";

    function afficherJavaScript() {
        var civilite = document.querySelector(
            'input[name="civilite"]:checked'
        ).value;
        var nom = document.getElementById("nom").value;
        var adresse = document.getElementsByName("adresse")[0].value;
        var codePostal = document.getElementById("code_postal").value;
        var localite = document.getElementById("localite").value;
        var pays = document.getElementById("pays").value;
        var D_N = document.getElementById("D_N").value;
        var D_R = document.getElementById("D_R").value;

        var plateformes = Array.from(
                document.querySelectorAll('input[name="platforms[]"]:checked')
            )
            .map(function(platform) {
                return platform.value;
            })
            .join(", ");
        var applications = Array.from(
                document.querySelectorAll("#applications option:checked")
            )
            .map(function(application) {
                return application.value;
            })
            .join(", ");

        var message = "Résumé des informations :\n\n";
        message += "Votre Civilité est : " + civilite + "\n";
        message += "Votre Nom est : " + nom + "\n";
        message += "Votre Adresse : " + adresse + "\n";
        message += "Votre Code Postal : " + codePostal + "\n";
        message += "Votre Localité : " + localite + "\n";
        message += "Votre Pays : " + pays + "\n";
        message += "Vos Plate-formes : " + plateformes + "\n";
        message += "Vos Applications : " + applications + "\n";
        message += "Votre Date de naissance : " + D_N + "\n";
        message += "Votre Date de RENDEZ-VOUS : " + D_R + "\n";

        alert(message);
    }

    document
        .getElementById("imageInput")
        .addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imageSrc = e.target.result;
                    document.getElementById("previewImage").src = imageSrc;
                    document.getElementById("previewImage").style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        });
    document
        .getElementById("imageInput2")
        .addEventListener("change", function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imageSrc = e.target.result;
                    document.getElementById("previewImage2").src = imageSrc;
                    document.getElementById("previewImage2").style.display = "block";
                };
                reader.readAsDataURL(file);
            }
        });

    function redirectToAnotherPage(i) {
        window.open(`${i}.html`, "_blank");
    }
    </script>
</body>
</html>