<?php
require 'db.conn.php';
$uploadDir = './uploads/';
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}
$id = $_POST['id'];
$sql = "SELECT * FROM persone WHERE id = $id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Affiche les données trouvées
    $per = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="css/style.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Modifier</title>
</head>

<body>
    <br />
    <form method="post" action="supprimer.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $_POST['id'];?>">
        <label for="civilite">Civilité:</label><br />
        <input type="radio" id="monsieur" name="civilite" value="<?php $c1='Monsieur'; echo $c1;?>"
            <?php if($c1 == $per['civilite'] ){ echo 'checked';}?> />
        <b>Monsieur</b>
        <input type="radio" id="madame" name="civilite" value="<?php $c2='Madame'; echo $c2;?>"
            <?php if($c2 == $per['civilite'] ){ echo 'checked';}?> />
        <b>Madame</b>
        <input type="radio" id="madamosile" name="civilite" value="<?php $c3='Madamosile'; echo $c3;?>"
            <?php if($c3 == $per['civilite'] ){ echo 'checked';}?> />
        <b>Madamosile</b><br /><br />

        <label for="nom">Nom/Prénom :</label>
        <input type="text" id="nom" name="nom" value="<?php echo $per['nom'];?>" required /><br /><br />

        <label for="adresse">Adresse :</label>
        <textarea id="adresse" name="adresse" cols="30" rows="1"
            required><?php echo $per['adresse'];?></textarea><br /><br />

        <label for="code_postal">Code Postal :</label>
        <input type="text" name="code_postal" id="code_postal" value="<?php echo $per['code_postal'];?>" /><br /><br />

        <label for="localite">Localité :</label>
        <input type="text" name="localite" id="localite" value="<?php echo $per['localite'];?>" /><br /><br />

        <label for="pays">Pays:</label>
        <select id="pays" name="pays">
            <option value="<?php $py1='alg'; echo $py1;?>" <?php if($py1 == $per['pays']){ echo 'selected';}?>>Algérie
            </option>
            <option value="<?php $py2='fra'; echo $py2;?>" <?php if($py2 == $per['pays']){ echo 'selected';}?>>Français
            </option>
            <option value="<?php $py3='bel'; echo $py3;?>" <?php if($py3 == $per['pays']){ echo 'selected';}?>>Belge
            </option>
            <option value="<?php $py4='cha'; echo $py4;?>" <?php if($py4 == $per['pays']){ echo 'selected';}?>>Chainise
            </option>
            <option value="<?php $py5='sui'; echo $py5;?>" <?php if($py5 == $per['pays']){ echo 'selected';}?>>Suisse
            </option>
        </select><br /><br />
        <?php $plateformes = explode(", ",$per['plateformes']);
              $applications = explode(", ",$per['applications']);?>
        <label for="platforms">Plate-formes :</label><br />
        <input type="checkbox" name="platforms[]" value="<?php $pl1 = 'Windows'; echo $pl1;?>"
            <?php foreach($plateformes as $plateforme){ if($plateforme == $pl1){echo 'checked';}}?> /> Windows
        <input type="checkbox" name="platforms[]" value="<?php $pl2 = 'Linux'; echo $pl2;?>"
            <?php foreach($plateformes as $plateforme){ if($plateforme == $pl2){echo 'checked';}}?> /> Linux
        <input type="checkbox" name="platforms[]" value="<?php $pl3 = 'Macintosh'; echo $pl3;?>"
            <?php foreach($plateformes as $plateforme){ if($plateforme == $pl3){echo 'checked';}}?> />Macintosh<br /><br />

        <label for="applications">Applications :</label><br />
        <select id="applications" name="applications[]" multiple>
            <option value="<?php $app1 = 'Bureautique'; echo $app1;?>"
                <?php foreach($applications as $application){ if($application == $app1){echo 'selected';}}?>>Bureautique
            </option>
            <option value="<?php $app2 = 'DAO'; echo $app2;?>"
                <?php foreach($applications as $application){ if($application == $app2){echo 'selected';}}?>>DAO
            </option>
            <option value="<?php $app3 = 'Statistique'; echo $app3;?>"
                <?php foreach($applications as $application){ if($application == $app3){echo 'selected';}}?>>Statistique
            </option>
            <option value="<?php $app4 = 'SGBD'; echo $app4;?>"
                <?php foreach($applications as $application){ if($application == $app4){echo 'selected';}}?>>SGBD
            </option>
            <option value="<?php $app5 = 'Internet'; echo $app5;?>"
                <?php foreach($applications as $application){ if($application == $app5){echo 'selected';}}?>>Internet
            </option>
        </select><br /><br />
        <label for="D_N">Date de naissance :</label>
        <input type="date" name="D_N" id="D_N" value="<?php echo $per['D_N'];?>" /> <br /><br />
        <label for="D_R">Date de rendez-vous :</label>
        <input type="date" name="D_R" id="D_R" value="<?php echo $per['D_R'];?>" /> <br /><br />
        <label for="imageInput">Insérer Image :</label>
        <input type="file" id="imageInput" name="imageInput"
            value="<?php echo 'c:/xampp/htdocs/tp77/uploads/'.$per['image'];?>" /><br /><br />
        <img id="previewImage" src="<?php echo 'uploads/'.$per['image'];?>" alt="Image preview"
            style=" max-width: 150px" /><br /><br />
        <label for="imageInput">Insérer le deuxième Image :</label>
        <input type="file" id="imageInput2" name="imageInput2"
            value="<?php echo 'uploads/'.$per['image2'];?>" /><br /><br />
        <img id="previewImage2" src="<?php echo 'uploads/'.$per['image2'];?>" alt="Image preview"
            style=" max-width: 150px" /><br /><br />
        <center>
            <button type="submit" name="Recherche">Supprimer</button>
        </center>
    </form>
</body>

</html>
<script>
var imageSrc = "";
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
</script>
<?php
} else {
    echo "Aucun résultat trouvé pour cet ID.";
}

            /*   echo "ID: " . $row["id"] . " civilite " . $row["civilite"] . " nom: " . $row["nom"] . "<br>"; 
            echo "<tr>";
            echo "<div>Votre ID: " . $row["id"] . "<br>";
            echo "Votre Civilite: <td>" . $row['civilite'] . "</td>" . "<br>";
            echo "Votre Nom:<td>" . $row['nom'] . "</td>" . "<br>";
            echo "Votre Adresse: <td>" . $row['adresse'] . "</td>" . "<br>";
            echo "Votre Code Postale: <td>" . $row['code_postal'] . "</td>" . "<br>";
            echo "Votre Localite: <td>" . $row['localite'] . "</td>" . "<br>";
            echo "Votre Pays: <td>" . $row['pays'] . "</td>" . "<br>";
            echo "Vos Plateformes: <td>" . $row['plateformes'] . "</td>" . "<br>";
            echo "Vos Applications: <td>" . $row['applications'] . "</td>" . "<br>";
            echo "Votre Date de naissance  : " . $row['D_N'] . "<br>";
            echo "Votre Date de rendez-vous  : " . $row['D_R'] . "<br></div>";
            $img = $row['image'];
            echo "<img width='300' height='150' src='uploads/{$img}' alt='your photo'></img><br /><br />";

            echo "</tr>";*/
?>