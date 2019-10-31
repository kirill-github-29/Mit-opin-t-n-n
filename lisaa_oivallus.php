<?php

/*
    Lisätään uusi oivallus tietokantaan
    https://www.w3schools.com/php/php_mysql_insert.asp
*/

require_once("mysqlConnection.php");

$sql = "INSERT INTO oivallus (paiva, oivallus) VALUES ('" . date("d.m.Y") . "', '" . mysqli_real_escape_string($conn, $_POST['lisaa_uusi_oivallus']) . "')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    die("Error: " . $sql . "<br>" . $conn->error);
}

$conn->close();

/*
    Ohjataan käyttäjä takaisin suvustolle
*/

header("Location: index.html");

?>
