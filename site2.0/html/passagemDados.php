<?php
function mandar_banco_dados($ocupacao, $data, $total, $questoes){
    require('../conexao_servidor.php');
    
    $stmt = $conn->prepare("INSERT INTO tabelaecologica (total, questoes) VALUES (:valor1, :valor2)");
    
    $stmt->bindValue(':valor1', $total);
    $stmt->bindValue(':valor2', $questoes);
    
    $stmt->execute();
     
    $stmt2 = $conn->prepare("INSERT INTO tabelainfo (ocupacao, dia) VALUES (:valor1, :valor2)");
    
    $stmt2->bindValue(':valor1', $ocupacao);
    $stmt2->bindValue(':valor2', $data);
    
    $stmt2->execute();
}

if (isset($_POST['botao'])){
    $ocupacao_variavel = $_POST['ocupacao'];
    echo($ocupacao_variavel);
    return;
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

    mandar_banco_dados($email_variavel, $data_atual, $total_variavel, $questoes_variavel);
    header('Location: resultado.html?total='. $total_variavel . "&dica=" . $dica_variavel);
    exit();
}

function verificar_respostas($lista){
    $respostas = [5, 4, 2, 4, 5, 3, 4, 4, 4, 4, 4, 3, 5, 2, 2, 2];
    $array_resposta_user = str_split($lista, 1);

    foreach($array_resposta_user as $indice => $res){
        if ($res > $respostas[$indice]){
            return false;
        }
    }
    return true;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" and 
    is_numeric($_POST['resultado_questoes']) and strlen($_POST['resultado_questoes']) == 16 
    and verificar_respostas($_POST['resultado_questoes']) and is_numeric($_POST['resultado_total']) 
    and $_POST['resultado_total'] <= 70 and $_POST['resultado_total'] > 0)
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
    <form method="post">
        <!-- Quardando dados -->
        <input type="hidden" name="questoes" value="<?= $_POST['resultado_questoes'] ?>">
        <input type="hidden" name="total" value="<?= $_POST['resultado_total'] ?>">
        <input type="hidden" name="dica" value="<?= $_POST['resultado_dica'] ?>">
        <!-- Formulario -->
        <label for="ocupacao_for">Escolha sua ocupação:</label>
        <select name="ocupacao" id="ocupacao_id">
            <option value="1">Professor</option>
            <option value="2">Aluno</option>
            <option value="3">Visitante</option>
            <option value="nao_escolhido">Escolha</option>
        </select>
        <button name="botao">Continuar</button>
    </form>
    <script src="../passagemDados.js"></script>
</body>
</html>
<?php }else{
        header('Location: quiz.html');
} ?>
