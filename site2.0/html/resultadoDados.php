<?php
    $lista_medias = array();
    require('../conexao_servidor.php');
    
    $stmt = $conn->prepare("SELECT * FROM tabelaecologica;");
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);

    // Preenche as listas com a quantidade de questões existentes
    $soma_todos = 0;
    $lista_alternativas = array();
    for ($x=0; $x<14; $x++){
        array_push($lista_alternativas, array(0,0,0,0,0));
        array_push($lista_medias, array(0,0,0,0,0));
    }

    // Coleta os dados do servidor
    $x = 0;
    foreach($resultado as $r){
        $soma_todos += $r->total;
        for ($i=0;$i<14;$i++){
            // Pega qual alternativa foi selecionada
            $lista_alternativas[$i][substr($r->questoes, $i, 1)-1] += 1;
        }
        $x++;
    }

    // Calcula a média de cada resposta
    for ($i=0; $i<14;$i++){
        for ($a=0; $a<5; $a++){
            $lista_medias[$i][$a] = intval(round(($lista_alternativas[$i][$a]/$x)*100));
        }
    }

    $media_total = intval(round($soma_todos / $x));

    $listinha = array(array("q" => "Com que frequência você come carne vermelha?", "1" => "Nunca", "2" =>"três porções por semana", "3"=> "uma porção por dia", "4"=>"Frequentemente", "5"=>"Sempre"),
     array("q" => "Com que frequência você come peixe ou frutos do mar?", "1" => "Nunca", "2" =>"Raramente", "3"=> "Ocasionalmente", "4"=>"Frequentemente", "5"=>""), 
     array("q" => "Você usa ar condicionado ou aquecedor na sua casa?", "1" => "sim", "2" =>"não", "3"=> "", "4"=>"", "5"=>""),
     array("q" => "Qual a procedência dos alimentos que você consome?", "1" => "De minha própria horta", "2" =>"A maior parte de feiras", "3"=> "Normalmente em supermercados", "4"=>"Sempre de supermercados", "5"=>""),
     array("q" => "Quantas vezes por ano você compra roupas novas?", "1" => "Nunca", "2" =>"Uma vez por ano", "3"=> "Duas vezes por ano", "4"=>"Três vezes por ano", "5"=>"Uma vez por mês ou mais"),
     array("q" => "Com que frequência você compra equipamentos eletrônicos?", "1" => "somente quando quebram e precisam ser substituídos", "2" =>"ocasionalmente troco por versões mais modernas", "3"=> "troco sempre por aparelhos mais modernos", "4"=>"", "5"=>""),
     array("q" => "Com que frequência você compra livros e jornais?", "1" => "Leio notícias pela internet ou compro livros impressos em papel reciclado", "2" =>"Tenho assinatura mensal de um jornal e geralmente compro algum livro", "3"=> "Compro livros ocasionalmente", "4"=>"Compro livros com frequência", "5"=>""),
     array("q" => "Como você descarta o lixo da sua casa?", "1" => "Não me preocupo em separar", "2" =>"Em duas lixeiras", "3"=> "Materiais eletrônicos encaminhados a postos de recolhimento", "4"=>"Em uma única lixeira", "5"=>""),
     array("q" => "Usa lâmpadas econômicas?", "1" => "Todas as lâmpadas que uso são econômicas", "2" =>"Metade das lâmpadas que uso são econômicas", "3"=> "1/4 das lâmpadas são econômicas", "4"=>"Não", "5"=>""),
     array("q" => "Que meio de transporte você mais usa?", "1" => "Bicicleta ou a pé", "2" =>"Transporte público", "3"=> "Carro, mas procuro andar a pé ou de bicicleta", "4"=>"Carro", "5"=>""),
     array("q" => "Com que frequência você bebe refrigerante?", "1" => "Nunca", "2" =>"Raramente", "3"=> "Ocasionalmente", "4"=>"Frequentemente", "5"=>""),
     array("q" => "Quanto tempo você gasta no banho diariamente?", "1" => "de 5 a 15min", "2" =>"de 16 a 25min", "3"=> "acima de 26min", "4"=>"", "5"=>""),
     array("q" => "Quantas horas você gasta viajando de avião anualmente?", "1" => "Nunca viajo", "2" =>"0 a 4 horas", "3"=> "4 a 10 horas", "4"=>"10 a 25 horas", "5"=>"Mais de 25 horas"),
     array("q" => "Qual a quantidade de alimentos que você consome que contém açúcar refinado?", "1" => "Nenhum alimento", "2" =>"Menos de 100g por semana", "3"=> "Mais de 100g por semana", "4"=>"", "5"=>""),
    );
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado dados</title>
    <link rel="icon" href="../Imagens/Logosite.png">
    <link rel="stylesheet" href="../css/resultadoDados.css">
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- fonte Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="caixa_titulo">
        <p id="texto_titulo">Média<br>Global</p>
        <p id="numero_media"><?= $media_total ?></p>
        <button id="irInicio">Retornar ao início</button>
        <button id="RefazerQuiz">Retornar ao resultado</button>
    </div>
    <div class="textos">
        <p>A partir daqui, você verá a média geral correspondente a todas as pessoas que fizeram o quiz. As perguntas possuem a porcentagem das pessoas que fizeram essa pesquisa.</p>
        <?php 
            for ($x = 0; $x <= 13; $x++){ ?>
                <div class="questao">
                    <!-- Q1 -->
                    <div id="tituloQuestao"><?= $x+1 ?><?= " - " ?><?= $listinha[$x]["q"] ?></div>
                    <div id="op1" class="option">
                        <span class="porcentagem"><?php echo($lista_medias[$x][0]. "% marcaram - ");?></span>
                        <?= $listinha[$x]["1"] ?>
                        <div class="progress" style="height: 15px; width: 60%; border-radius: 16px; background: #cccccc;">
                            <div class="progress-bar bg-success" id="barra_resultado" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <!-- Q2 -->
                    <div id="op2" class="option">
                        <span class="porcentagem"><?php echo($lista_medias[$x][1]. "% marcaram - ");?></span>
                        <?= $listinha[$x]["2"] ?>
                        <div class="progress" style="height: 15px; width: 60%; border-radius: 16px; background: #cccccc;">
                            <div class="progress-bar bg-warning" id="barra_resultado" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <!-- Q3 -->
                    <div id="op3" class="option">
                        <span class="porcentagem"><?php if ($listinha[$x]["3"] != "")echo($lista_medias[$x][2]. "% marcaram - ");?></span>
                        <?= $listinha[$x]["3"] ?>
                        <?php if ($listinha[$x]["3"] != ""){ ?>
                        <div class="progress" style="height: 15px; width: 60%; border-radius: 16px; background: #cccccc;">
                            <div class="progress-bar bg-warning" id="barra_resultado" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <?php }?>
                    </div>
                    <!-- Q4 -->
                    <div id="op4" class="option">
                        <span class="porcentagem"><?php if ($listinha[$x]["4"] != "")echo($lista_medias[$x][3]. "% marcaram - ");?></span>
                        <?= $listinha[$x]["4"] ?>
                        <?php if ($listinha[$x]["4"] != ""){ ?>
                        <div class="progress" style="height: 15px; width: 60%; border-radius: 16px; background: #cccccc;">
                            <div class="progress-bar bg-danger" id="barra_resultado" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <?php }?>
                    </div>
                    <!-- Q5 -->
                    <div id="op5" class="option">
                        <span class="porcentagem"><?php if ($listinha[$x]["5"] != "")echo($lista_medias[$x][4]. "% marcaram - ");?></span>
                        <?= $listinha[$x]["5"] ?>
                        <?php if ($listinha[$x]["5"] != ""){ ?>
                        <div class="progress" style="height: 15px; width: 60%; border-radius: 16px; background: #cccccc;">
                            <div class="progress-bar bg-danger" id="barra_resultado" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            <?php }?>      
    </div>
    <script src="../resultadoDados.js"></script>
</body>
</html>
