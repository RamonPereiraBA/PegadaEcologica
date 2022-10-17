<html>
<head>
<meta charset="UTF-8"/>
<title>Pegada Ecológica CSN</title>
<link rel="icon" href="Imagens/Logosite.png">

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

.pegadaResultado{
    font-family: 'Roboto', sans-serif;
    font-size: 10vh;
    color: #034159;
    margin-left: 51%;
    letter-spacing: 2px;
    position: relative;
    margin-bottom: 1%;
    margin-top: 19%;
}

.boxResultado{
    background-color: #0CF25D;
    margin-left: -45%;
    margin-top: -2%;
    position: fixed;
    width: 70%;
    z-index: 1;
}

.pontuacao{
    color: white;
    position: relative;
    font-size: 24vh;
    margin-top: 4%;
    margin-left: 70%;
    color: #0CF25D;
}

.comentario{

}

.boxPontuacao{
    background-color: #025951;
    border-radius: 10px;    
    margin-left: -45%;
    margin-top: 19%;
    margin-bottom: 12%;
    position: fixed;
    width: 70%;
    height: 90%;
}

body{
    width: 95%;
    max-width: 800px;
    margin: auto;
    background-color: #034159; 
    background-size: 1900px;    
    font-family: sans-serif;
    line-height: 1.5;
    color: white;
}

.p{
    font-family: 'Cabin', sans-serif;
    font-size: 3vh;
}
.emohi{
    margin: auto;
    text-align: center;
}

.res-name{
    text-align: center;
}


.bot {
    border: 6px;
    border-radius: 15px;
    background-color: white;
    color: black;
    margin-top: 72vh;
    padding: 2% 8%;
    margin-left: 105.1%;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    transition-duration: .3s;
}

.bot:hover{
    background-color: black;
    color: white;
}

.refazerPesquisa {
    border: 6px;
    border-radius: 15px;
    background-color: #0CF25D;
    color: black;
    margin-left: 92%;
    text-align: center;
    margin-top: 4vh;
    padding: 2% 8%;
    text-decoration: none;
    white-space: nowrap;
    display: inline-block;
    transition-duration: .3s;
    width:  20vh;
}

.refazerPesquisa:hover{
    background-color: black;
    color: white;
}

</style>

</head>
    <body>

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