<?php
$servername = "greenlight.dev.br";
$username = "hjjyaccv_hjjyaccv";
$password = "pegadaecologica123@";
$dbname = "hjjyaccv_pegadaecologica";


try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>