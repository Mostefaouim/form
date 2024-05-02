<?php
require'db.conn.php';
$id = $_POST['id'];
$civilite = $_POST['civilite'];
$nom = $_POST['nom'];
$adresse = $_POST['adresse'];
$codePostal = $_POST['code_postal'];
$localite = $_POST['localite'];
$pays = $_POST['pays'];
$plateformes = implode(', ', $_POST['platforms']);
$applications = implode(', ', $_POST['applications']);
$D_N = $_POST['D_N'];
$D_R = $_POST['D_R'];
$fileTmpPath = $_FILES['imageInput']['tmp_name'];
$fileName2 = $_FILES['imageInput2']['name'];
$fileSize2 = $_FILES['imageInput2']['size'];
$fileType2 = $_FILES['imageInput2']['type'];
$fileNameCmps2 = explode(".", $fileName2);
$fileExtension2 = strtolower(end($fileNameCmps2));
$allowedExtensions2 = ['jpg', 'jpeg', 'png'];

if ($_FILES['imageInput']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['imageInput']['tmp_name'];
    $fileName = $_FILES['imageInput']['name'];
    $fileSize = $_FILES['imageInput']['size'];
    $fileType = $_FILES['imageInput']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $allowedExtensions = ['jpg', 'jpeg', 'png'];
    if (in_array($fileExtension, $allowedExtensions)) {
        $dest_path = 'uploads/' . $fileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $sql = "UPDATE form SET civilite='$civilite', nom='$nom', adresse='$adresse', code_postal='$codePostal', localite='$localite', pays='$pays', plateformes='$plateformes', applications='$applications',D_N='$D_N', D_R='$D_R', image='$fileName',image2 ='$fileName2' WHERE id=$id";
            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully <br /><center>
                <a href='/tp77'><input type='button' value='home'></a>
            </center>";
            } else {
                if ($conn->errno == 1062) {
                    echo 'Erreur: Duplication de clé primaire détectée.';
                } else {
                    echo 'Erreur d\'enregistrement : ' . $conn->error;
                    echo "<br>";
                    echo "SQL Query: " . $sql;
                }
            }
        } else {
            echo "Error uploading image.";
        }
    } else {
        echo "Invalid file format. Allowed formats: " . implode(', ', $allowedExtensions);
    }
} else {
    echo "No image uploaded.";
}
?>