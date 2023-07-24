<?php
function mandar_banco_dados($email, $data, $total, $questoes){
    require('../conexao_servidor.php');
    
    $stmt = $conn->prepare("INSERT INTO tabelaecologica (total, questoes) VALUES (:valor1, :valor2)");
    
    $stmt->bindValue(':valor1', $total);
    $stmt->bindValue(':valor2', $questoes);
    
    $stmt->execute();
     
    $stmt2 = $conn->prepare("INSERT INTO tabelainfo (email, dia) VALUES (:valor1, :valor2)");
    
    $stmt2->bindValue(':valor1', $email);
    $stmt2->bindValue(':valor2', $data);
    
    $stmt2->execute();
}

if (isset($_POST['botao'])){
    $email_variavel = $_POST['email'];
    $data_atual = date("Y-m-d");
    $total_variavel = $_POST['total'];
    $questoes_variavel = $_POST['questoes'];
    $dica_variavel = $_POST['dica'];

    if (!is_numeric($questoes_variavel) and strlen($questoes_variavel) != 16 and
        !is_numeric($total_variavel) and $total_variavel > 70 and $total_variavel <=0){
        //
        header('Location: quiz.html');
        exit();
    }

    if ($email_variavel == null){
        mandar_banco_dados(null, $data_atual, $total_variavel, $questoes_variavel);
        header('Location: resultado.html?total='. $total_variavel . "&dica=" . $dica_variavel);
        exit();
    }

    if (! filter_var($email_variavel, FILTER_VALIDATE_EMAIL)){
        echo("Seu email é invalido");
    }else {
        mandar_banco_dados($email_variavel, $data_atual, $total_variavel, $questoes_variavel);
        header('Location: resultado.html?total='. $total_variavel . "&dica=" . $dica_variavel);
        exit();
    }
}

if ($_SERVER["REQUEST_METHOD"] === "POST" and 
    is_numeric($_POST['resultado_questoes']) and strlen($_POST['resultado_questoes']) == 16 and
    is_numeric($_POST['resultado_total']) and $_POST['resultado_total'] <= 70 and $_POST['resultado_total'] > 0) 
{      
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta
      http-equiv="Cache-Control"
      content="no-cache, no-store, must-revalidate"
    />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
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
    <p>Você gostaria de compartilhar seu endereço de e-mail conosco?</p>
    <!-- Formulario botão radio  -->
    <form method="post">
        <!-- Quardando dados -->
        <input type="hidden" name="questoes" value="<?= $_POST['resultado_questoes'] ?>">
        <input type="hidden" name="total" value="<?= $_POST['resultado_total'] ?>">
        <input type="hidden" name="dica" value="<?= $_POST['resultado_dica'] ?>">
        <!-- Formulario -->
        <input type="radio" id="option1" name="option" value="sim">
        <label for="option1">Sim</label>
        <input type="radio" id="option2" name="option" value="não">
        <label for="option2">Não</label><br>
        <p>*Seu e-mail será utilizado para o envio dos resultados de nossas pesquisas para você. Garantimos que ele não será compartilhado com terceiros*</p>
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
<?php }else{
        header('Location: quiz.html');
} ?>
