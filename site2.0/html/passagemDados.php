<?php
function mandar_banco_dados($bairro, $unidade, $data, $total, $questoes){
    require('../conexao_servidor.php');
    
    $stmt = $conn->prepare("INSERT INTO tabelaecologica (total, questoes) VALUES (:valor1, :valor2)");
    
    $stmt->bindValue(':valor1', $total);
    $stmt->bindValue(':valor2', $questoes);
    
    $stmt->execute();
     
    $stmt2 = $conn->prepare("INSERT INTO tabelainfo (bairro, unidade, dia) VALUES (:valor1, :valor2, :valor3");
    
    $stmt2->bindValue(':valor1', $bairro);
    $stmt2->bindValue(':valor2', $unidade);
    $stmt2->bindValue(':valor3', $data);
    
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
    $bairro_variavel = $_POST['bairro'];
    $unidade_variavel = $_POST['unidade'];
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
    mandar_banco_dados($bairro_variavel, $unidade_variavel, $data_atual, $total_variavel, $questoes_variavel);
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
            <label for="bairro_dropdown">Informe seu bairro</label>
            <select id="bairro_dropdown_id" name="bairro_dropdown">
                <option value="bairro">bairro</option>
            </select>
            <label for="departamentos">Trabalha na CSN? Nos informe sua Unidade Organizacional</label>
            <select id="departamentos" name="departamentos">
                <option value="COORDENACAO DE ENGENHARIA">COORDENACAO DE ENGENHARIA</option>
                <option value="DIRETORIA EXECUTIVA PRODUCAO SIDERURGIA">DIRETORIA EXECUTIVA PRODUCAO SIDERURGIA</option>
                <option value="GERENCIA TRANSPORTE FERROVIARIO INTERNO">GERENCIA TRANSPORTE FERROVIARIO INTERNO</option>
                <option value="COORDENACAO DE ENGENHARIA EQUIPAMENTOS">COORDENACAO DE ENGENHARIA EQUIPAMENTOS</option>
                <option value="GERENCIA DE MANUTENCAO DO LTQ">GERENCIA DE MANUTENCAO DO LTQ</option>
                <option value="COORDENACAO INSP MECANICA ALTOS FORNOS">COORDENACAO INSP MECANICA ALTOS FORNOS</option>
                <option value="GERENCIA GERAL PLANEJAMENTO E DESEMPENHO">GERENCIA GERAL PLANEJAMENTO E DESEMPENHO</option>
                <option value="GERENCIA DE CILINDROS">GERENCIA DE CILINDROS</option>
                <option value="GERENCIA DE PROCESSOS DA LAMINACAO">GERENCIA DE PROCESSOS DA LAMINACAO</option>
                <option value="COORDENACAO DE GESTAO DE MANUTENCAO">COORDENACAO DE GESTAO DE MANUTENCAO</option>
                <option value="GERENCIA DE OFICINAS MECANICAS">GERENCIA DE OFICINAS MECANICAS</option>
                <option value="GERENCIA DE LABORATORIO">GERENCIA DE LABORATORIO</option>
                <option value="GERENCIA DE MANUTENCAO E TRANSPORTE">GERENCIA DE MANUTENCAO E TRANSPORTE</option>
                <option value="GERENCIA DE PROJETOS METALURGIA DO ACO">GERENCIA DE PROJETOS METALURGIA DO ACO</option>
                <option value="GERENCIA DE MANUTENCAO">GERENCIA DE MANUTENCAO</option>
                <option value="GERENCIA DE PROG CONTR E ABASTECIMENTO">GERENCIA DE PROG CONTR E ABASTECIMENTO</option>
                <option value="COORDENACAO DE PROJETOS ESPECIAIS">COORDENACAO DE PROJETOS ESPECIAIS</option>
                <option value="GERENCIA DE ENTREPOSTOS E ESCOAMENTO">GERENCIA DE ENTREPOSTOS E ESCOAMENTO</option>
                <option value="COORDENACAO INSPECAO SINTERIZACAO 4">COORDENACAO INSPECAO SINTERIZACAO 4</option>
                <option value="GERENCIA DE PREV E COMBATE A INCENDIO">GERENCIA DE PREV E COMBATE A INCENDIO</option>
                <option value="GERENCIA DE SUPORTE OPERACIONAL">GERENCIA DE SUPORTE OPERACIONAL</option>
                <option value="GERENCIA TECNOLOGIA DE AUTOMACAO">GERENCIA TECNOLOGIA DE AUTOMACAO</option>
                <option value="GERENCIA DE MANUTENCAO ELETRICA">GERENCIA DE MANUTENCAO ELETRICA</option>
                <option value="GERENCIA DE MANUTENCAO REFRATARIA">GERENCIA DE MANUTENCAO REFRATARIA</option>
                <option value="GERENCIA DE PATIO DE MATERIAS PRIMAS">GERENCIA DE PATIO DE MATERIAS PRIMAS</option>
                <option value="GERENCIA DE ALTOS FORNOS">GERENCIA DE ALTOS FORNOS</option>
                <option value="COORDENACAO DE PLANEJAMENTO E CONTROLE">COORDENACAO DE PLANEJAMENTO E CONTROLE</option>
                <option value="GERENCIA DE PROJETOS SINTERIZACAO">GERENCIA DE PROJETOS SINTERIZACAO</option>
                <option value="COORDENACAO DE PROJETOS ESPECIAIS">COORDENACAO DE PROJETOS ESPECIAIS</option>
                <option value="GERENCIA DE PROJETOS COQUERIA">GERENCIA DE PROJETOS COQUERIA</option>
                <option value="COORDENACAO DE PLANEJAMENTO E CONTROLE">COORDENACAO DE PLANEJAMENTO E CONTROLE</option>
                <option value="GERENCIA DE REDUCAO A FRIO LTF 3">GERENCIA DE REDUCAO A FRIO LTF 3</option>
                <option value="GERENCIA DE RECOZIMENTO E ACABAMENTO">GERENCIA DE RECOZIMENTO E ACABAMENTO</option>
                <option value="GERENCIA DE AGUAS E EFLUENTES">GERENCIA DE AGUAS E EFLUENTES</option>
                <option value="GERENCIA DE LINGOTAMENTO CONTINUO">GERENCIA DE LINGOTAMENTO CONTINUO</option>
                <option value="GERENCIA GERAL  DE PLANEJAMENTO E LOGISTICA">GERENCIA GERAL  DE PLANEJAMENTO E LOGISTICA</option>
                <option value="GERENCIA GERAL DE DESENV DE PRODUTOS">GERENCIA GERAL DE DESENV DE PRODUTOS</option>
                <option value="GERENCIA DE LAMINADOS A QUENTE">GERENCIA DE LAMINADOS A QUENTE</option>
                <option value="GERENCIA DE PROJETOS LAMINACAO">GERENCIA DE PROJETOS LAMINACAO</option>
                <option value="DIRETORIA DE METALURGIA">DIRETORIA DE METALURGIA</option>
                <option value="GERENCIA DE LAMINADOS A FRIO">GERENCIA DE LAMINADOS A FRIO</option>
                <option value="GERENCIA MANUT GALVANIZ E LAMINADOS FRIO">GERENCIA MANUT GALVANIZ E LAMINADOS FRIO</option>
                <option value="GERENCIA DE ALTOS FORNOS">GERENCIA DE ALTOS FORNOS</option>
                <option value="GERENCIA DESENV PRODUTOS UPV">GERENCIA DESENV PRODUTOS UPV</option>
                <option value="GERENCIA DE MANUTENCAO ELETROMECANICA">GERENCIA DE MANUTENCAO ELETROMECANICA</option>
                <option value="GERENCIA DE PREP ARMAZENAGEM BOBINAS">GERENCIA DE PREP ARMAZENAGEM BOBINAS</option>
                <option value="GERENCIA DE DECAPAGEM ACIDA">GERENCIA DE DECAPAGEM ACIDA</option>
                <option value="GERENCIA GERAL LAMIN FRIO GALV DECAPAGEM">GERENCIA GERAL LAMIN FRIO GALV DECAPAGEM</option>
                <option value="GERENCIA DE ESTANHAMENTO">GERENCIA DE ESTANHAMENTO</option>
                <option value="GERENCIA DE ENCRUAMENTO">GERENCIA DE ENCRUAMENTO</option>
                <option value="GERENCIA DE PONTE ROLANTE">GERENCIA DE PONTE ROLANTE</option>
                <option value="GERENCIA DE MANUT DA METALURGIA DO ACO">GERENCIA DE MANUT DA METALURGIA DO ACO</option>
                <option value="GERENCIA DE MOVIMENTACAO DE PRODUTO">GERENCIA DE MOVIMENTACAO DE PRODUTO</option>
                <option value="GERENCIA DE CALCINACAO">GERENCIA DE CALCINACAO</option>
                <option value="GERENCIA MANUTENCAO DE EXECUCAO REDUCAO">GERENCIA MANUTENCAO DE EXECUCAO REDUCAO</option>
                <option value="GERENCIA DE DISTRIBUICAO DE ENERGETICO">GERENCIA DE DISTRIBUICAO DE ENERGETICO</option>
                <option value="GERENCIA DE CARBOQUIMICOS E CALCINACAO">GERENCIA DE CARBOQUIMICOS E CALCINACAO</option>
                <option value="GERENCIA DE GARANTIA DA QUALIDADE">GERENCIA DE GARANTIA DA QUALIDADE</option>
                <option value="GERENCIA DE RECOZIMENTO E ZINCAGEM">GERENCIA DE RECOZIMENTO E ZINCAGEM</option>
                <option value="GERENCIA MANUT LINGOTAMENTO CONTINUO">GERENCIA MANUT LINGOTAMENTO CONTINUO</option>
                <option value="GERENCIA GERAL DE EXECUCAO">GERENCIA GERAL DE EXECUCAO</option>
                <option value="GERENCIA DE INSPECAO MECANICA REFRATAR">GERENCIA DE INSPECAO MECANICA REFRATAR</option>
                <option value="GERENCIA DE SINTERIZACOES">GERENCIA DE SINTERIZACOES</option>
                <option value="GERENCIA DE MANUTENCAO DE UTILIDADES">GERENCIA DE MANUTENCAO DE UTILIDADES</option>
                <option value="GERENCIA GERAL DE LAMINADOS A QUENTE">GERENCIA GERAL DE LAMINADOS A QUENTE</option>
                <option value="GERENCIA LAMINACAO QUENTE FRIO">GERENCIA LAMINACAO QUENTE FRIO</option>
                <option value="COORDENACAO DE PLANEJAMENTO E CONTROLE">COORDENACAO DE PLANEJAMENTO E CONTROLE</option>
                <option value="COORDENACAO DE DESEMPENHO DE CONTRATOS">COORDENACAO DE DESEMPENHO DE CONTRATOS</option>
                <option value="COORDENACAO PLANEJAMENTO DE PERFORMANCE">COORDENACAO PLANEJAMENTO DE PERFORMANCE</option>
                <option value="COORDENACAO PROCESSOS LAMINACAO A QUENTE">COORDENACAO PROCESSOS LAMINACAO A QUENTE</option>
                <option value="GERENCIA DE DESENVOLVIMENTO INDUSTRIAL">GERENCIA DE DESENVOLVIMENTO INDUSTRIAL</option>
                <option value="GERENCIA GERAL DE METALURGIA DO ACO">GERENCIA GERAL DE METALURGIA DO ACO</option>
                <option value="GERENCIA DE MANUTENCAO">GERENCIA DE MANUTENCAO</option>
                <option value="GERENCIA QUALID PRODUTOS ASSIST TECNICA">GERENCIA QUALID PRODUTOS ASSIST TECNICA</option>
                <option value="GERENCIA GERAL ENERGETICOS E UTILIDADES">GERENCIA GERAL ENERGETICOS E UTILIDADES</option>
                <option value="COORDENACAO DE UTILIDADES">COORDENACAO DE UTILIDADES</option>
                <option value="COORDENACAO DE LAMINACAO">COORDENACAO DE LAMINACAO</option>
                <option value="COORDENACAO DE PCP FATURAMENTO E ACESSO">COORDENACAO DE PCP FATURAMENTO E ACESSO</option>
                <option value="COORDENACAO DE PINTURA">COORDENACAO DE PINTURA</option>
                <option value="DIRETORIA PROJETOS MANUTENCAO E SUPORTE">DIRETORIA PROJETOS MANUTENCAO E SUPORTE</option>
                <option value="GERENCIA GERAL DE OPERACOES PARANA">GERENCIA GERAL DE OPERACOES PARANA</option>
                <option value="GERENCIA GERAL DE OPERACOES PORTO REAL">GERENCIA GERAL DE OPERACOES PORTO REAL</option>
                <option value="GERENCIA MANUT MAQ MOV E CORREIAS TRANSP">GERENCIA MANUT MAQ MOV E CORREIAS TRANSP</option>
                <option value="GERENCIA DE COQUEIFICACAO">GERENCIA DE COQUEIFICACAO</option>
                <option value="GERENCIA DE PCP EMBALAGEM E LOGISTICA">GERENCIA DE PCP EMBALAGEM E LOGISTICA</option>
                <option value="GERENCIA DE MANUTENCAO">GERENCIA DE MANUTENCAO</option>
                <option value="GERENCIA DE PROJETOS ALTO FORNO">GERENCIA DE PROJETOS ALTO FORNO</option>
                <option value="GERENCIA CENTRO DE SERVICO E ZINCAGEM">GERENCIA CENTRO DE SERVICO E ZINCAGEM</option>
                <option value="DIRETORIA DE PRODUTOS">DIRETORIA DE PRODUTOS</option>
                <option value="GERENCIA DE MANUTENCAO MECANICA">GERENCIA DE MANUTENCAO MECANICA</option>
                <option value="GERENCIA DE LINGOTAMENTO CONTINUO">GERENCIA DE LINGOTAMENTO CONTINUO</option>
                <option value="GERENCIA GERAL DE TECNOLOGIA E PROJETOS">GERENCIA GERAL DE TECNOLOGIA E PROJETOS</option>
                <option value="GERENCIA GERAL PRODUCAO ACOS LONGOS">GERENCIA GERAL PRODUCAO ACOS LONGOS</option>
                <option value="GERENCIA GERAL SINTERIZACAO E ALTO FORNO">GERENCIA GERAL SINTERIZACAO E ALTO FORNO</option>
                <option value="GERENCIA GERAL DE REDUTORES">GERENCIA GERAL DE REDUTORES</option>
            </select>
            <label for="csn">Não trabalho na CSN</label>
            <input type="checkbox" id="csn" name="csn">
            <button onclick="confirmar_3()">Continuar</button>
        </div>
    </div>
    <script src="../passagemDados.js"></script>
</body>
</html>
<?php }else{
        header('Location: quiz.html');
} ?>
