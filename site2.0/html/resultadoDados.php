<?php
    $listinha = array(array("q" => "Com que frequência você come carne vermelha?", "1" => "come carne", "2" =>"come sempre", "3"=> "come peixe", "4"=>"cansei de escrever", "5"=>""),
     array("q" => "Com que frequência você come peixe ou frutos do mar?", "1" => "come carne", "2" =>"come sempre", "3"=> "come peixe", "4"=>"cansei de escrever", "5"=>"sla"), 
     array("q" => "Você usa ar condicionado ou aquecedor na sua casa?", "1" => "come carne", "2" =>"come sempre", "3"=> "come peixe", "4"=>"cansei de escrever", "5"=>""),
     array("q" => "Qual a procedência dos alimentos que você consome?", "1" => "come carne", "2" =>"come sempre", "3"=> "come peixe", "4"=>"cansei de escrever", "5"=>""),
     array("q" => "Quantas vezes por ano você compra roupas novas?", "1" => "come carne", "2" =>"come sempre", "3"=> "come peixe", "4"=>"cansei de escrever", "5"=>""),
     array("q" => "Com que frequência você compra equipamentos eletrônicos?", "1" => "come carne", "2" =>"come sempre", "3"=> "come peixe", "4"=>"cansei de escrever", "5"=>""),
     array("q" => "Com que frequência você compra livros e jornais?", "1" => "come carne", "2" =>"come sempre", "3"=> "come peixe", "4"=>"cansei de escrever", "5"=>""),
     array("q" => "Como você descarta o lixo da sua casa?", "1" => "come carne", "2" =>"come sempre", "3"=> "come peixe", "4"=>"cansei de escrever", "5"=>""),
     array("q" => "Usa lâmpadas econômicas?", "1" => "come carne", "2" =>"come sempre", "3"=> "come peixe", "4"=>"cansei de escrever", "5"=>""),
     array("q" => "Que meio de transporte você mais usa?", "1" => "come carne", "2" =>"come sempre", "3"=> "come peixe", "4"=>"cansei de escrever", "5"=>""),
     array("q" => "Com que frequência você bebe refrigerante?", "1" => "come carne", "2" =>"come sempre", "3"=> "come peixe", "4"=>"cansei de escrever", "5"=>""),
     array("q" => "Quanto tempo você gasta no banho diariamente?", "1" => "come carne", "2" =>"come sempre", "3"=> "come peixe", "4"=>"cansei de escrever", "5"=>""),
     array("q" => "Quantas horas você gasta viajando de avião anualmente?", "1" => "come carne", "2" =>"come sempre", "3"=> "come peixe", "4"=>"cansei de escrever", "5"=>""),
     array("q" => "Qual a quantidade de alimentos que você consome que contém açúcar refinado?", "1" => "come carne", "2" =>"come sempre", "3"=> "come peixe", "4"=>"cansei de escrever", "5"=>""),
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
        <button id="RefazerQuiz">Voltar ao QUIZ</button>
    </div>
    <div class="textos">
        <?php 
            for ($x = 0; $x <= 13; $x++){ ?>
                <div class="questao">
                    <div id="tituloQuestao"><?= $listinha[$x]["q"] ?></div>
                    <div id="op1" class="option"><?= $listinha[$x]["1"] ?></div>
                    <div id="op2" class="option"><?= $listinha[$x]["2"] ?></div>
                    <div id="op3" class="option"><?= $listinha[$x]["3"] ?></div>
                    <div id="op4" class="option"><?= $listinha[$x]["4"] ?></div>
                    <div id="op5" class="option"><?= $listinha[$x]["5"] ?></div>
                </div>
         <?php }?>        
    </div>
</body>
</html>
