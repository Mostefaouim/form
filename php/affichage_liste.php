<?php
$sql_select = "SELECT * FROM form";
$result = $conn->query($sql_select);
if ($result->num_rows > 0) {
        echo "<h2>Liste des enregistrements :</h2>";
        echo "<table border='1'>";
        echo "<tr><th>numero</th><th>Civilité</th><th>Nom</th><th>Adresse</th><th>Code Postal</th><th>Localité</th><th>Pays</th><th>Plate-formes</th><th>Applications</tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['id']."</td>";
            echo "<td>" . $row['civilite'] . "</td>";
            echo "<td>" . $row['nom'] . "</td>";
            echo "<td>" . $row['adresse'] . "</td>";
            echo "<td>" . $row['code_postal'] . "</td>";
            echo "<td>" . $row['localite'] . "</td>";
            echo "<td>" . $row['pays'] . "</td>";
            echo "<td>" . $row['plateformes'] . "</td>";
            echo "<td>" . $row['applications'] . "</td>";

            echo "</tr>";
        }
        echo "</table>";
} else {
        echo "Aucun enregistrement trouvé.";
}
?>