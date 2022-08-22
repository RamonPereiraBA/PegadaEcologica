<html>
<head>
<meta charset="UTF-8"/>
<title>Pegada Ecológica CSN</title>
<link rel="icon" href="Imagens/Logosite.png">
<style>

body{
    width: 95%;
    max-width: 800px;
    margin: auto;
    background: url(imagens/Futuro/FundoE.jpg);
    

    font-family: sans-serif;
    line-height: 1.5;
    color: white;
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
            <h1 class="headline"><?php
                include_once("Contagem.php");
                echo $total;
            ?></h1>
            <!--Pegada Boa-->
            <h3><?php
                include_once("Contagem.php");
                if($total >= 50)
                echo $tituloResposta1;
            ?></h3>
            <p><?php
                include_once("Contagem.php");
                if($total >= 50)
                echo $textoResposta1;
            ?></p>

            <!--Pegada Moderada-->
            <h3><?php
                include_once("Contagem.php");
                if($total >= 35 and $total <= 49)
                echo $tituloResposta2;
            ?></h3>
            <p><?php
                include_once("Contagem.php");
                if($total >= 35 and $total <= 49)
                echo $textoResposta2;
            ?></p>

            <!--Pegada Ruim-->
            <h3><?php
                include_once("Contagem.php");
                if($total <35)
                echo $tituloResposta3;
            ?></h3>
            <p><?php
                include_once("Contagem.php");
                if($total < 35)
                echo $textoResposta3;
            ?></p>
            
            <hr>
            <br>
            <center>
                <a href="index.html" class="bot">Voltar para o inicio</a>
            </center>
            <br>
        </main>

    </body>

</html>