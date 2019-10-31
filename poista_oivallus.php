<?php

/*
    Poistetaan oivallus tietokannasta
    https://www.w3schools.com/php/php_mysql_delete.asp
*/

require_once("mysqlConnection.php");

if(isset($_GET['id'])){
    // sql to delete a record
    $sql = "DELETE FROM oivallus WHERE id=".mysqli_real_escape_string($conn, $_GET['id']);

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        die("Error deleting record: " . $conn->error);
    }
}

header('Location: ' . $_SERVER['HTTP_REFERER']);

$conn->close();

?>