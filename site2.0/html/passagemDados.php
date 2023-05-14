<?php
require('../conexao_servidor.php');
/*

$total = $_GET['total'];
$questoes = $_GET['questoes'];

$stmt = $conn->prepare("INSERT INTO tabelaecologica (total, questoes, email) VALUES (:valor1, :valor2, :valor3)");

$stmt->bindValue(':valor1', $total);
$stmt->bindValue(':valor2', $questoes);
$stmt->bindValue(':valor3', $email);

$stmt->execute();
*/

function checar_email($teste){
    if ($teste == ""){
        echo "Coloque o email";
        return false;
    }
    return true;
}

if (isset($_POST['botao'])) {
    $email_variavel = $_POST['email'];
    echo $email_variavel;
    
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
	<link rel="icon" href="../Imagens/logosite.png">
    <link rel="stylesheet" href="../css/passagemDados.css">

    <!-- Importando presets das fontes -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Antes de continuar...</h1>
    <p>Deseja contribuir para a nossa pesquisa?</p>
    <!-- Formulario botão radio  -->
    <form>
        <input type="radio" id="option1" name="option" value="sim">
        <label for="option1">Sim</label>
        <input type="radio" id="option2" name="option" value="não">
        <label for="option2">Não</label><br>
        <p>*Seus dados serão coletados para auxiliar nossas pesquisas. Mas eles não serão exibidos para mais ninguém*</p>
        <!-- Formulario do email -->
        <div id="formulario_email">
            <p>Insira seu Email</p>
            <input type="email" id="input_email" name="email" placeholder="Email">
        </div>
        <button name="botao">Continuar</button>
    </form>
    
    <script src="../passagemDados.js"></script>
</body>
</html>
