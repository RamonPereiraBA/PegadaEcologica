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
        <p id="texto_titulo">média<br>global</p>
        <p id="numero_media">770</p>
        <button id="irInicio">Retornar ao início</button>
        <button id="RefazerQuiz">Voltar ao QUIZ</button>
    </div>
    <div id="textos">
        <?php 
            for ($x = 1; $x <= 14; $x++){ ?>
                <div id="questao">
                    <div id="tituloQuestao"></div>
                    <div id="op1" class="option"></div>
                    <div id="op2" class="option"></div>
                    <div id="op3" class="option"></div>
                    <div id="op4" class="option"></div>
                    <div id="op5" class="option"></div>
                </div>
            <?php }?>        
    </div>
</body>
</html>
