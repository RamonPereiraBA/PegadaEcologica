<html>
<head>
<meta charset="UTF-8"/>
<title>Pegada Ecológica CSN</title>



<style>
    body{
    width: 95%;
    max-width: 800px;
    margin: auto;
    background: url(imagens/FundoE.jpg);
    

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

.band-name{
    text-align: center;
}
.headline{
    text-align: center;
}

.concerts{
    margin: 30px 0;
    text-align: center;
    width: 100%;
}

.concerts table{
    
    border-radius: 10px;
    padding: 10px;
    margin: 0 auto;
}
</style>

</head>
    <body>
        <main>

            <h1 class="band-name">Seu Resultado Foi:</h1>
            <h2 class="headline"><?php
                include_once("Contagem.php");
                echo $total;
            ?></h2>
            <!--1resposta-->
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

            <!--2resposta-->
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

            <!--3resposta-->
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

        </main>
    </body>


</html>