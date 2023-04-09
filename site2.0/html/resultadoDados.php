<?php
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

    $lista_medias = array(array(20, 10, 40, 30, 0), array(10, 10, 80, 0, 0), array(10, 10, 10, 40, 30), array(10, 10, 10, 70, 0),
                    array(50, 50, 0, 0, 0), array(40, 10, 50, 0, 0), array(90, 10, 0, 0, 0), array(10, 10, 80, 0, 0), array(20, 20, 20, 20, 20),
                    array(50, 50, 0, 0, 0), array(20, 80, 0, 0, 0), array(10, 90, 0, 0, 0), array(90, 10, 0, 0, 0), array(40, 60, 0, 0, 0));

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

    <!-- fonte Montserrat -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="caixa_titulo">
        <p id="texto_titulo">Média<br>Global</p>
        <p id="numero_media">69</p>
        <button id="irInicio">Retornar ao início</button>
        <button id="RefazerQuiz">Retornar ao resultado</button>
    </div>
    <div class="textos">
        <?php 
            for ($x = 0; $x <= 13; $x++){ ?>
                <div class="questao">
                    <div id="tituloQuestao"><?= $x+1 ?><?= " - " ?><?= $listinha[$x]["q"] ?></div>
                    <div id="op1" class="option"><?php if ($lista_medias[$x][0] != 0)echo($lista_medias[$x][0]. "% marcaram - ");?><?= $listinha[$x]["1"] ?></div>
                    <div id="op2" class="option"><?php if ($lista_medias[$x][1] != 0)echo($lista_medias[$x][1]. "% marcaram - ");?><?= $listinha[$x]["2"] ?></div>
                    <div id="op3" class="option"><?php if ($lista_medias[$x][2] != 0)echo($lista_medias[$x][2]. "% marcaram - ");?><?= $listinha[$x]["3"] ?></div>
                    <div id="op4" class="option"><?php if ($lista_medias[$x][3] != 0)echo($lista_medias[$x][3]. "% marcaram - ");?><?= $listinha[$x]["4"] ?></div>
                    <div id="op5" class="option"><?php if ($lista_medias[$x][4] != 0)echo($lista_medias[$x][4]. "% marcaram - ");?><?= $listinha[$x]["5"] ?></div>
                </div>
         <?php }?>        
    </div>
    <script src="../resultadoDados.js"></script>
</body>
</html>
