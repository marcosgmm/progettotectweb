<?php

$conn = new mysqli("localhost", "root", "", "Database");

$comandoSQL = "select name from tbl_restaurant where id = 1";

$ris = $conn -> query($comandoSQL);

$riga = &ris -> fetch_assoc();

echo "Il nome e': ".$riga['name']."!";
?>
