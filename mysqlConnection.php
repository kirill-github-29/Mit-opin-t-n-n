<?php

/* Azure in APP MySQL */
$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';

foreach ($_SERVER as $key => $value) {
  if (strpos($key, "MYSQLCONNSTR_") !== 0) {
    continue;
  }

  $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
  $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
  $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
  $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

// Create connection
$conn = new mysqli($connectstr_dbhost, $connectstr_dbusername, $connectstr_dbpassword, $connectstr_dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>