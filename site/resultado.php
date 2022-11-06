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
    $total = $_GET["total"];
    if ($total >= 50)
    {
        $tituloResposta = "Excelente";
        $comentario="Parabéns, você é uma pessoa que se <b>importa</b> com o <b>meio ambiente</b>";
        $textoResposta = "
        Se você fez de 50 a 70 pontos, Parabéns!! Você está antenado com as questões ambientais e 
        busca ter qualidade de vida sem agredir o meio ambiente.
        ";
    }
    elseif ($total >= 35 and $total <= 49)
    {
        $tituloResposta = "Moderada";
        $comentario="Você <b>pode</b> melhorar";
        $textoResposta = "
        Se você fez de 35 a 49 pontos, sua pegada é moderada. Seu estilo de vida
        está um pouco acima da capacidade natural de regeneração de recursos pelo
        planeta, de modo que seu padrão de consumo demanda moderadamente mais
        do que a Terra pode repor.
        ";
        $dica = "Dica: Procure fazer a pé ou de bicicleta os percursos curtos do dia a dia,
        como: ir à padaria, academia ou farmácia no seu bairro. Utilize o carro somente para percursos longos.";
    }
    else
    {
        $tituloResposta = "Péssimo";   
        $comentario="Você <b>precisa</b> melhorar";
        $textoResposta = "
        Se você fez menos de 35 pontos, precisa rever seus hábitos de consumo! Você vive de forma insustentável, pois demanda demais do que a capacidade natural de regeneração do planeta.";
        $dica = "Dica: Verifique se o produto antigo não atende às suas necessidades e, 
        se estiver quebrado ou com problemas. Separe o lixo para reciclagem - não custa nada!
        Confira como funciona a coleta seletiva na sua cidade, fique atento às datas. Transportes alternativos, 
        como bicicletas e até uma boa caminhada reduzem a emissão de gases.";
    }

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
                <a href="quiz.html" class="refazerPesquisa p">Refazer Pesquisa</a>
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
