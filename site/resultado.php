<html>
<head>
<meta charset="UTF-8"/>
<title>Pegada Ecológica CSN</title>
<link rel="icon" href="Imagens/Logosite.png">

<link rel="stylesheet" href="resultado.css" >

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
                <?php echo $comentario;?>
            </div>

            <div class="boxResultado">
                <h1 class="pegadaResultado"><?php echo $tituloResposta;?></h1>
            </div>


            <div class="boxPontuacao">
                <h1 class="pontuacao"><?php echo $total;?></h1>
                <p class="suapontuacaofoi">Sua pontuação foi...</p>
            </div>
            
            <div id="textoResposta" class="p">
                <?php echo $textoResposta;?>
            </div>

            <div class="alinhar">
                <a href="index.html" class="bot p">Início</a>
                <a href="pesquisa.html" class="refazerPesquisa p">Refazer Pesquisa</a>
            </div>

            <?php
                if ($tituloResposta == "Moderada" or $tituloResposta == "Péssimo")
                {
                    echo "<span id='dica'>Quer uma dica?</span>";
                }
            ?>
            <script>
                // o elemento "dica" é o botão
                const button = document.getElementById('dica');

                // o elemento comentario é a label
                const comentario = document.getElementById('textoResposta');
                const dica = `<?php echo $dica; ?>`;
                

                var clicado = 0;

                button.onmouseout = function() {
                    button.style.color = "#0CF25D";
                }

                button.onmouseover = function() {
                    button.style.color = "white";
                }
                

                // se o botão for clicado, altere a label do comentario
                

                button.addEventListener('click', function handleClick() {
                    if (clicado == 0){
                    comentario.innerHTML = dica;
                    button.innerHTML = "Retornar";
                    clicado = 1;
                    }                else{
                    comentario.innerHTML = `<?php echo $textoResposta; ?>`;
                    console.log(`<?php echo $textoResposta; ?>`);
                    button.innerHTML = "Quer uma dica?";
                    clicado = 0;

                }
                });
                

            </script>
    </body>
</html>