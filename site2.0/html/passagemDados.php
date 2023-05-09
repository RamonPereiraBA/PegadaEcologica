<?php
require('conexao_servidor.php');

$total = $_GET['total'];
$questoes = $_GET['questoes'];

$stmt = $conn->prepare("INSERT INTO tabelaecologica (total, questoes) VALUES (:valor1, :valor2)");

$stmt->bindValue(':valor1', $total);
$stmt->bindValue(':valor2', $questoes);

$stmt->execute();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        var resultado = urlParams.get('total');
        var dicaURL = urlParams.get('dica');
        location.href="resultado.html?total="+resultado+"&dica="+dicaURL;
    </script>
</body>
</html>
