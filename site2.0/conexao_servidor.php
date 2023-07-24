<?php
$servername = "localhost";
$username = "root";
$password = "senha";
$dbname = "pegadaecologica";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
