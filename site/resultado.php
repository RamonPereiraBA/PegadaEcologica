<html>
<head>
<meta charset="UTF-8"/>
<title>Pegada Ecológica CSN</title>
<link rel="icon" href="Imagens/Logosite.png">

<link rel="stylesheet" href="resultado.css" >

<!-- importando fontes -->
<!-- montserrat -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&family=Roboto:wght@500&display=swap" rel="stylesheet">

<!-- cabin -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cabin&family=Roboto:wght@700&display=swap" rel="stylesheet">


<!-- Incluindo o calculo e escolhendo o fundo -->
<?php 
    try{
        if (!isset($_GET["total"])){
            throw new Exception('');
        }else{
            $total = $_GET['total'];
        }
    }
    catch(Exception $e){
        $total = 0;
    }
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
                <a href="index.html" class="bot p" id="btInicio">Início</a>
                <a href="quiz.html" class="refazerPesquisa p" id="btRefazer">Refazer Pesquisa</a>
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
                const tituloResposta = `<?php echo $tituloResposta;?>`;
                // o elemento comentario é a label
                const comentario = document.getElementById('textoResposta');
                const dica = `<?php echo $dica; ?>`;
                
                // componentes da tela
                const Boxresultado = document.getElementsByClassName('boxresultado');
                const Boxpontuacao = document.getElementsByClassName('boxPontuacao');
                const pegadaResultado = document.getElementsByClassName('pegadaResultado')
                const pontuacao = document.getElementsByClassName('pontuacao')
                const suapontuacaofoi = document.getElementsByClassName('suapontuacaofoi')
                const comento = document.getElementsByClassName('comentario')
                const btrefazer = document.getElementById('btRefazer')
                
                if (tituloResposta == "Moderada"){

                    for(var i = 0; i < Boxresultado.length; i++)
                    {
		                Boxresultado[i].style.backgroundColor = "#FFAE00";
	                }

                    for(var i = 0; i < pegadaResultado.length; i++)
                    {
		                pegadaResultado[i].style.color = "#010221";
	                }

                    for(var i = 0; i < Boxpontuacao.length; i++)
                    {
		                Boxpontuacao[i].style.backgroundColor = "#C43302";
                    }

                    for(var i = 0; i < pontuacao.length; i++)
                    {
		                pontuacao[i].style.color = "#010221";
	                }

                    for(var i = 0; i < suapontuacaofoi.length; i++)
                    {
		                suapontuacaofoi[i].style.color = "#010221";
	                }

                    for(var i = 0; i < comento.length; i++)
                    {
		                comento[i].style.color = "#010221";
	                }

                    comentario.style.color = "#010221";
                    document.body.style.backgroundColor = "#B7BF99";
                    button.style.color = "#010221";
                    btrefazer.style.backgroundColor = "#FFAE00";

                }
                else if (tituloResposta == "Péssimo")
                    {
                        for(var i = 0; i < Boxresultado.length; i++)
                    {
		                Boxresultado[i].style.backgroundColor = "#D92929";
	                }

                    for(var i = 0; i < pegadaResultado.length; i++)
                    {
		                pegadaResultado[i].style.color = "#010221";
	                }

                    for(var i = 0; i < Boxpontuacao.length; i++)
                    {
		                Boxpontuacao[i].style.backgroundColor = "#260101";
                    }

                    for(var i = 0; i < pontuacao.length; i++)
                    {
		                pontuacao[i].style.color = "#D92929";
	                }

                    for(var i = 0; i < suapontuacaofoi.length; i++)
                    {
		                suapontuacaofoi[i].style.color = "#D92929";
	                }

                    for(var i = 0; i < comento.length; i++)
                    {
		                comento[i].style.color = "#260101";
	                }

                    comentario.style.color = "#260101";
                    document.body.style.backgroundColor = "#B0BFBE";
                    button.style.color = "#260101";
                    btrefazer.style.backgroundColor = "#D92929";
                }
                

                var clicado = 0;

                button.onmouseout = function() {
                    if (tituloResposta == "Excelente")
                    {
                        button.style.color = "#0CF25D";
                    }
                    else if (tituloResposta == "Moderada")
                    {
                        button.style.color = "#010221"
                    }
                }

                button.onmouseover = function() {
                    if (tituloResposta == "Excelente")
                    {
                        button.style.color = "#0CF25D";

                    }
                    else if (tituloResposta == "Moderada")
                    {
                        button.style.color = "#010221"
                    }
                    else{
                        button.style.color = "#260101"
                    }
                }
                

                // se o botão for clicado, altere a label do comentario
                

                button.addEventListener('click', function handleClick() {
                    if (clicado == 0){
                    comentario.innerHTML = dica;
                    button.innerHTML = "Retornar";
                    clicado = 1;
                    }else{
                    comentario.innerHTML = `<?php echo $textoResposta; ?>`;
                    console.log(`<?php echo $textoResposta; ?>`);
                    button.innerHTML = "Quer uma dica?";
                    clicado = 0;

                }
                });
                


            </script>
    </body>
</html>
