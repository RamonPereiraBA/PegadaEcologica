<?php

// total de pontos
$total = 0;

// lista para armazenar as respostas do user
$resposta = [];

// # atribuindo pontos pras questões

$questoes = array(
        'op1-a' => 5,
        'op1-b' => 5,
        'op1-c' => 4,
        'op1-d' => 1,
        'op1-e' => 0,

        'op2-a' => 5,
        'op2-b' => 5,
        'op2-c' => 4,
        'op2-d' => 3,
        'op2-e' => 1,

        'op3-a' => 5,
        'op3-b' => 1,

        'op4-a' => 5,
        'op4-b' => 4,
        'op4-c' => 3,
        'op4-d' => 1,
        'op4-e' => 0,

        'op5-a' => 5,
        'op5-b' => 4,
        'op5-c' => 2,
        'op5-d' => 1,
        'op5-e' => 0,

        'op6-a' => 5,
        'op6-b' => 2,
        'op6-c' => 0,
        'op6-d' => 0,
        'op6-e' => 0,

        'op7-a' => 5,
        'op7-b' => 4,
        'op7-c' => 2,
        'op7-d' => 1,
        'op7-e' => 0,

        'op8-a' => 1,
        'op8-b' => 4,
        'op8-c' => 5,
        'op8-d' => 5,
        'op8-e' => 0,

        'op9-a' => 1,
        'op9-b' => 2,
        'op9-c' => 4,
        'op9-d' => 5,
        'op9-e' => 0,

        'op10-a' => 1,
        'op10-b' => 5,
        'op10-c' => 5,
        'op10-d' => 2,
        'op10-e' => 0,

        'op11-a' => 5,
        'op11-b' => 4,
        'op11-c' => 2,
        'op11-d' => 1,
        'op11-e' => 0,

        'op12-a' => 1,
        'op12-b' => 3,
        'op12-c' => 5,
        'op12-d' => 0,
        'op12-e' => 0,

        'op13-a' => 5,
        'op13-b' => 4,
        'op13-c' => 3,
        'op13-d' => 1,
        'op13-e' => 0,

        'op14-a' => 4,
        'op14-b' => 0,
        'op14-c' => 5,
);

// lendo os dados do html
// armazenando as respostas na lista $resposta
for ($i = 1; $i < 15; $i++)
{
    # a lista $resposta representa a resposta dada a questão
    $resposta[$i] = $_POST['questao' . $i]; // pegando a resposta do html e atribuindo a lista $resposta
}


// somando os pontos das respostas
for ($i = 1; $i < 15; $i++)
{

    if (array_key_exists($resposta[$i], $questoes))
    {
        $total += $questoes[$resposta[$i]];
    }
}

// verificando os pontos e fazendo um if/else

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
    Dica: Procure fazer a pé ou de bicicleta os percursos curtos do dia a dia,
    como: ir à padaria, academia ou farmácia no seu bairro. Utilize o carro somente para percursos longos. 
    ";
}
else
{
    $tituloResposta = "Péssimo";   
    $comentario="Você <b>precisa</b> melhorar";
    $textoResposta = "
    Se você fez menos de 35 pontos, precisa rever seus hábitos de consumo! Você vive de forma insustentável, pois demanda demais do que a capacidade natural de regeneração do planeta.
Dica: Verifique se o produto antigo não atende às suas necessidades e, 
se estiver quebrado ou com problemas. Separe o lixo para reciclagem - não custa nada!
 Confira como funciona a coleta seletiva na sua cidade, fique atento às datas. Transportes alternativos, 
 como bicicletas e até uma boa caminhada reduzem a emissão de gases.";
}


?>