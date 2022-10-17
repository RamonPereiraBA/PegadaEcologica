<html>
<head>
<meta charset="UTF-8"/>
<title>Pegada Ecológica CSN</title>
<link rel="icon" href="Imagens/Logosite.png">
<link rel="stylesheet" href="resultado.css">

<!-- importando fontes -->
<!-- roboto -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">

<!-- cabin -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cabin&family=Roboto:wght@700&display=swap" rel="stylesheet">


<!-- Incluindo o calculo e escolhendo o fundo -->
<?php 
    include_once("Contagem.php");


    if ($tituloResposta == "Excelente")
    {
        $img = "FundoEx.jpg";
    }
    elseif ($tituloResposta == "Moderada")
    {
        $img = "FundoM.jpg";
    }
    else
    {
        $img = "FundoR.jpg";
    }
?>


</head>
    <body>

    
            <div class="comentario p">
                <?php
                echo $comentario;
            ?>
            </div>
            <div class="boxResultado">
                <h1 class="pegadaResultado"><?php echo $tituloResposta;?></h1>
            </div>


            <div class="boxPontuacao">
                <h1 class="pontuacao"><?php echo $total;?></h1>
            </div>

                <a href="index.html" class="bot p">Início</a>
                <a href="pesquisa.html" class="refazerPesquisa p">Refazer Pesquisa</a>
            <br>

    </body>

</html>