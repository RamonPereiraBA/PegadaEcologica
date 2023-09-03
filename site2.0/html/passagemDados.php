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
    // O valor de cada opção
    $valores_questoes = array(
        array(7, 4, 2, 0, 0),
        array(6, 2, 0, 0, 0),
        array(6, 3, 2, 0, 0),
        array(6, 4, 3, 3, 2),
        array(6, 0, 0, 0, 0),
        array(6, 4, 3, 2, 0),
        array(7, 3, 0, 0, 0),
        array(7, 0, 0, 0, 0),
        array(6, 0, 0, 0, 0),
        array(6, 0, 0, 0, 0),
        array(7, 0, 0, 0, 0)
    );
    $total = 0;
    foreach (str_split($questoes, 1) as $indice => $letra){
        $total += $valores_questoes[$indice][$letra - 1];
    }
    return $total;
}

if ($_SERVER["REQUEST_METHOD"] === "POST" and isset($_POST['bairro'])){
    echo ("foi");
    return;
    $ocupacao_variavel = $_POST['ocupacao'];
    $data_atual = date("Y-m-d");
    $questoes_variavel = $_POST['questoes'];
    $dica_variavel = $_POST['dica'];

    if (!is_numeric($questoes_variavel) or strlen($questoes_variavel) != 11 or 
        !verificar_respostas($questoes_variavel))
    {
        ///////////////////////////////////////////////////////////////////////////////
        header('Location: quiz.html');
        exit();
    }
    $total_variavel = somarTotal($questoes_variavel);
    mandar_banco_dados($ocupacao_variavel, $data_atual, $total_variavel, $questoes_variavel);
    header('Location: resultado.html?total='. $total_variavel . "&dica=" . $dica_variavel);
    exit();
}

function verificar_respostas($lista){
    // Nessa lista contem a quantidade de opções do quiz
    $respostas = [3, 2, 3, 5, 2, 4, 3, 2, 2, 2, 2];
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
    is_numeric($_POST['resultado_questoes']) and strlen($_POST['resultado_questoes']) == 11
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
    <!-- <link rel="stylesheet" href="../css/passagemDados.css"> -->
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;800&display=swap');

:root
{
    --fundo: #F2F2F2;
    --verde-span: #9FC131;
    --texto-header: #005C53;
    --texto: #012030;
    --tamanho-fonte: 2vw;
}

*
{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    text-decoration: none;
}

body
{
    font-family: 'Poppins', 'sans-serif';
    background-color: var(--fundo);
    color: var(--texto);
    text-align: center;
}

h1
{
    margin-top: 5%;
}

#formulario h3
{
    margin-top: 8vh;
    margin-bottom: 4vh;
    font-weight: 600;
}

#formulario h3:last-of-type
{    
    font-weight: 500;
    font-size: .8rem;
}

input[type="radio"]
{
    font-size: 1.25rem;
}

#formulario label
{
    cursor: pointer;
    margin-left: 5px;
    margin-bottom: 5vh;
    font-size: calc(1rem + .4vw);
}

button
{
    cursor: pointer;
    display: block;
    margin: 5vh auto;
    padding: 15px 8vw;
    background-color:transparent;
    font-family: 'Poppins', 'sans-serif';
    font-size: calc(1rem + .5vw);
}

button:active
{
    position: relative;
    top: 2px;
}

</style>
<body>
    <h1>Antes de continuar...</h1>
    <form method="post" id="formulario_variaveis">
        <!-- Quardando dados -->
        <input type="hidden" name="questoes" value="<?= $_POST['resultado_questoes'] ?>">
        <input type="hidden" name="total" value="<?= $_POST['resultado_total'] ?>">
        <input type="hidden" name="dica" value="<?= $_POST['resultado_dica'] ?>">
        <input type="hidden" name="morador" value="">
        <input type="hidden" name="bairro" value="">
        <input type="hidden" name="unidade" value="">
    </form>
    <!-- Formulario -->
    <div id="formulario">
        <div id="form_1_id">
            <h3>Deseja ampliar nossa Pesquisa nos informando mais sobre você?</h3>
            <input type="radio" value="s" name="resposta_form_1" id="radio-sim-quero">
                <label for="radio-sim-quero">
                    Sim, quero contribuir e ajudar o meio ambiente!
                </label>
            <br>
            <input type="radio" value="n" name="resposta_form_1" id="radio-nao-quero">
                <label for="radio-nao-quero">
                    Não, quero ver meu resultado
                </label>
            <h3>🔒 Garantimos que as perguntas serão usadas apenas como maneira de ampliar nosso foco na cidade</h3>                
            <button onclick="confirmar_1()">Continuar</button>
        </div>
        <div id="form_2_id" style="display: none;">
            <h3>É morador de Volta Redonda?</h3>
            <input type="radio" value="s" name="resposta_form_2" id="radio-sim-vr">
            <label for="radio-sim-vr">
                Sim
            </label>
            <br>
            <input type="radio" value="n" name="resposta_form_2" id="radio-nao-vr">
            <label for="radio-nao-vr">
                Não
            </label>
            <button onclick="confirmar_2()">Continuar</button>
        </div>
        <div id="form_3_id" style="display: none;">
            <h3>Informe seu bairro</h3>
            <input type="radio" value="s" name="resposta_form_2">Sim<br>
            <input type="radio" value="n" name="resposta_form_2">Não<br>
            <button onclick="confirmar_2()">Continuar</button>
        </div>
    </div>
    <script src="../passagemDados.js"></script>
</body>
</html>
<?php }else{
        header('Location: quiz.html');
} ?>
