<html>
<head>
<meta charset="UTF-8"/>
<title>Pegada Ecológica CSN</title>
<link rel="icon" href="Imagens/Logosite.png">

<!-- Incluindo o calculo e escolhendo o fundo -->
<?php 
    include_once("Contagem.php");


    if ($tituloResposta == "Pegada Excelente")
    {
        $img = "FundoEx.jpg";
        $emogi= "felizS.png";
    }
    elseif ($tituloResposta == "Pegada Moderada")
    {
        $img = "FundoM.jpg";
        $emogi= "analise.png";
    }
    else
    {
        $img = "FundoR.jpg";
        $emogi= "triste.png";
    }
?>

<style>

body{
    width: 95%;
    max-width: 800px;
    margin: auto;
    background: url("imagens/futuro/<?= $img; ?>");
    background-size: 1900px;
    

    font-family: sans-serif;
    line-height: 1.5;
    color: white;
}

.emohi{
    margin: auto;
    text-align: center;
}

main{
    background: #00000057;
    padding: 5px 40px;
    margin-top: 20px;
    border-radius: 10px;
}

.res-name{
    text-align: center;
}
.headline{
    text-align: center;
}

.bot {
    border: 6px solid #eee;
    border-radius: 20px;
    background-color: white;
    color: Black;
}

</style>

</head>
    <body>
        <main>


            <h1 class="res-name">Seu Resultado Foi:</h1>
            <h1 class="headline">
            
            <?php
                echo $total;
            ?></h1>

            <!--- Pegada Boa-->
            <h3>
                <?php
                    if($total >= 50)
                    echo $tituloResposta;
                ?>
            </h3>

            <p>
                <?php
                if($total >= 50)
                echo $textoResposta;
                ?>
            </p>

            <!--Pegada Moderada-->
            <h3>
                <?php
                    if($total >= 35 and $total <= 49)
                    echo $tituloResposta;
                ?>
            </h3>

            <p>
                <?php
                    if($total >= 35 and $total <= 49)
                    echo $textoResposta;  
                ?>
            </p>

            <!--Pegada Ruim-->
            <h3>
                <?php
                    if($total <35)
                    echo $tituloResposta;
            ?>
            </h3>

            <p>
                <?php
                if($total < 35)
                echo $textoResposta;
                ?>
            </p>
            
            <hr>
            <div class="emohi">
                <img src="Imagens/futuro/<?= $emogi; ?>">
            </div>
            <br>
            <center>
                <a href="index.html" class="bot">Voltar para o inicio</a>
            </center>
            <br>
        </main>

    </body>

</html>