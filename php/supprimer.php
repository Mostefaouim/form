<?php
require 'db.conn.php';

$id = $_POST['id'];
$sql = "DELETE FROM form WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully <br /><center>
    <a href='/tp77'><input type='button' value='home'></a>
</center>";
  } else {
    echo "Error deleting record: " . $conn->error;
  }
$conn->close();
?>