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
    // Verificando se o valor foi passado pela url	
    try{
        if (!isset($_GET["total"])){
            throw new Exception('');
        }else{
            $total = $_GET['total'];
        }
    }
    // Se não foi, então total será 0
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


            <div class="comentario p" id="comentario">
                <?php echo $comentario;?>
            </div>

            <div class="boxResultado" id="boxResultado">
                <h1 class="pegadaResultado" id="pegadaResultado"><?php echo $tituloResposta;?></h1>
            </div>


            <div class="boxPontuacao" id="boxPontuacao">
                <h1 class="pontuacao" id="pontuacao"><?php echo $total;?></h1>
                <p class="suapontuacaofoi" id="suapontuacaofoi">Sua pontuação foi...</p>
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

<!--- cores e definições -->
<script>
                // componentes da tela
                const Boxresultado = document.getElementById('boxresultado');
                const Boxpontuacao = document.getElementById('boxPontuacao');
                const pegadaResultado = document.getElementById('pegadaResultado')
                const pontuacao = document.getElementById('pontuacao')
                const suapontuacaofoi = document.getElementById('suapontuacaofoi')
                const comento = document.getElementById('comentario')
                const btrefazer = document.getElementById('btRefazer')
                const comentario = document.getElementById('textoResposta');
                const button = document.getElementById('dica');
                const tituloResposta = `<?php echo $tituloResposta;?>`;
                const dica = `<?php echo $dica; ?>`;

                // declarando as cores de cada componente
                var boxResultadoCor
                var pegadaResultadoCor
                var boxPontuacaoCor
                var pontuacaoCor
                var suapontuacaofoiCor
                var comentoCor
                var comentarioCor
                var dicaCor
                var btrefazerCor
                var fundoCor

                // definindo a paleta de cor pra cada resultado
                if (tituloResposta == "Moderada"){
                    boxResultadoCor = "#FFAE00"
                    pegadaResultadoCor = "#010221"
                    boxPontuacaoCor = "#C43302"
                    pontuacaoCor = "#010221"
                    suapontuacaofoiCor = "#010221"
                    comentoCor = "#010221"
                    comentarioCor = "#010221"
                    dicaCor = "#010221"
                    btrefazerCor = "#FFAE00"
                    fundoCor = "#B7BF99"
                }
                else if (tituloResposta == "Péssimo")
                    {
                    boxResultadoCor ="#D92929"
                    pegadaResultadoCor = "#010221"
                    boxPontuacaoCor = "#260101"
                    pontuacaoCor = "#D92929"
                    suapontuacaofoiCor = "#D92929"
                    comentoCor = "#260101"
                    comentarioCor = "#260101"
                    dicaCor = "#260101"
                    btrefazerCor = "#D92929"
                    fundoCor = "#B0BFBE"
                }

                // setando as cores
                comentario.style.color = comentarioCor;
                document.body.style.backgroundColor = fundoCor;
                button.style.color = dicaCor;
                btrefazer.style.backgroundColor = btrefazerCor;
                boxResultado.style.backgroundColor = boxResultadoCor;
                Boxpontuacao.style.backgroundColor = boxPontuacaoCor;
                comento.style.color = comentoCor;
                suapontuacaofoi.style.color = suapontuacaofoiCor;
                pontuacao.style.color = pontuacaoCor;
                pegadaResultado.style.color = pegadaResultadoCor;
                


                // quando o mouse ficar em cima do botão
                button.onmouseover = function() {
                    if (tituloResposta == "Moderada"){
                        button.style.color = "#C43302"
                    }else{
                        button.style.color = boxResultadoCor;
                    }
                }

                // quando o mouse sair do botão
                button.onmouseout = function() {
                    button.style.color = dicaCor
                }
                

                // se o botão for clicado, altere o conteúdo do comentario
                
                var primeiroClick = true;

                button.addEventListener('click', function handleClick() {
                    if (primeiroClick == true){
                    comentario.innerHTML = dica;
                    button.innerHTML = "Retornar";
                    primeiroClick = false;
                    }
                    else{
                    comentario.innerHTML = `<?php echo $textoResposta; ?>`;
                    button.innerHTML = "Quer uma dica?";
                    primeiroClick = true;
                }
                });
                


</script>

    </body>
</html>
