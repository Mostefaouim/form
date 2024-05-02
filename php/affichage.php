<?php
echo "<h2>Résumé des informations :</h2>";
    echo "Votre Civilité est : " . $_POST['civilite'] . "<br>";
    echo "Votre Nom est : " . $_POST['nom'] . "<br>";
    echo "Votre Adresse : " . $_POST['adresse'] . "<br>";
    echo "Votre Code Postal : " . $_POST['code_postal'] . "<br>";
    echo "Votre Date de naissance  : " . $_POST['D_N'] . "<br>";
    echo "Votre Date de rendez-vous  : " . $_POST['D_R'] . "<br>";

    echo "Votre Localité : " . $_POST['localite'] . "<br>";
    echo "Votre Pays : " . $_POST['pays'] . "<br>";
    echo "Vos Plate-formes : " . implode(', ', $_POST['platforms']) . "<br>";
    echo "Vos Applications : " . implode(', ', $_POST['applications']) . "<br>";

    if (isset($_FILES['imageInput']) && $_FILES['imageInput']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['imageInput']['name'];
        $dest_path = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['imageInput']['tmp_name'], $dest_path)) {
            echo "Image uploaded successfully.<br>";
            /* echo "<img src='$dest_path' alt='Uploaded Image' style='max-width: 200px;'> <br><br>"; */
        } else {
            echo "Error uploading image.<br>";
        }
    }
    ?>