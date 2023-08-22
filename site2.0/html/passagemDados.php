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

function somarTotal($questoes){
    $pointsList = array(
        array(5, 4, 2, 1, 0),
        array(5, 4, 3, 2, 0),
        array(1, 4, 0, 0, 0),
        array(5, 4, 3, 1, 0),
        array(5, 5, 4, 2, 1),
        array(4, 2, 0, 0, 0),
        array(4, 3, 2, 1, 0),
        array(4, 3, 1, 1, 0),
        array(4, 3, 2, 1, 0),
        array(5, 5, 2, 1, 0),
        array(4, 3, 2, 1, 0),
        array(4, 3, 1, 0, 0),
        array(5, 4, 3, 2, 0),
        array(4, 2, 0, 0, 0),
        array(4, 2, 0, 0, 0),
        array(4, 2, 0, 0, 0)
    );
    $total = 0;
    foreach (str_split($questoes, 1) as $indice => $letra){
        $total += $pointsList[$indice][$letra - 1];
    }
    return $total;
}

if (isset($_POST['botao'])){
    $ocupacao_variavel = $_POST['ocupacao'];
    $data_atual = date("Y-m-d");
    $questoes_variavel = $_POST['questoes'];
    $dica_variavel = $_POST['dica'];

    if (!is_numeric($questoes_variavel) or strlen($questoes_variavel) != 16 or $ocupacao_variavel < 1 or 
        $ocupacao_variavel > 3 or !is_numeric($ocupacao_variavel) or !verificar_respostas($questoes_variavel))
    {
        //
        header('Location: quiz.html');
        exit();
    }
    $total_variavel = somarTotal($questoes_variavel);
    echo($total_variavel);
    return;
    mandar_banco_dados($ocupacao_variavel, $data_atual, $total_variavel, $questoes_variavel);
    header('Location: resultado.html?total='. $total_variavel . "&dica=" . $dica_variavel);
    exit();
}

function verificar_respostas($lista){
    $respostas = [5, 4, 2, 4, 5, 3, 4, 4, 4, 4, 4, 3, 5, 2, 2, 2];
    $array_resposta_user = str_split($lista, 1);
    
    // Verificando se o valor da resposta está no quiz, evitando fraudes
    foreach($array_resposta_user as $indice => $res){
        if ($res > $respostas[$indice]){
            return false;
        }
    }
    return true;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" and 
    is_numeric($_POST['resultado_questoes']) and strlen($_POST['resultado_questoes']) == 16 
    and verificar_respostas($_POST['resultado_questoes']))
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
            <option value="nao_escolhido">Escolha</option>
            <option value="1">Professor</option>
            <option value="2">Aluno</option>
            <option value="3">Visitante</option>
        </select>
        <button name="botao" id="botao">Continuar</button>
    </form>
    <script src="../passagemDados.js"></script>
</body>
</html>
<?php }else{
        header('Location: quiz.html');
} ?>
