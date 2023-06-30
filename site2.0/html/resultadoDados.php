<?php
    header('Access-Control-Allow-Origin: *');
    
    $lista_medias = array();
    require('../conexao_servidor.php');
    
    $stmt = $conn->prepare("SELECT * FROM tabelaecologica;");
    $stmt->execute();
    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);

    // Preenche as listas com a quantidade de questões existentes
    $soma_todos = 0;
    $lista_alternativas = array();
    for ($x=0; $x<16; $x++){
        array_push($lista_alternativas, array(0,0,0,0,0));
        array_push($lista_medias, array(0,0,0,0,0));
    }

    // Coleta os dados do servidor
    $x = 0;
    foreach($resultado as $r){
        $soma_todos += $r->total;
        for ($i=0;$i<16;$i++){
            // Pega qual alternativa foi selecionada
            $lista_alternativas[$i][substr($r->questoes, $i, 1)-1] += 1;
        }
        $x++;
    }

    // Calcula a média de cada resposta
    for ($i=0; $i<16;$i++){
        for ($a=0; $a<5; $a++){
            $lista_medias[$i][$a] = intval(round(($lista_alternativas[$i][$a]/$x)*100));
        }
    }

    $media_total = intval(round($soma_todos / $x));

    /*$listinha = array(array("q" => "Com que frequência você come carne vermelha?", "1" => "Nunca", "2" =>"três porções por semana", "3"=> "uma porção por dia", "4"=>"Frequentemente", "5"=>"Sempre"),
     array("q" => "Com que frequência você come peixe ou frutos do mar?", "1" => "Nunca", "2" =>"Raramente", "3"=> "Ocasionalmente", "4"=>"Frequentemente", "5"=>""), 
     array("q" => "Você usa ar condicionado ou aquecedor na sua casa?", "1" => "sim", "2" =>"não", "3"=> "", "4"=>"", "5"=>""),
     array("q" => "Qual a procedência dos alimentos que você consome?", "1" => "De minha própria horta", "2" =>"A maior parte de feiras", "3"=> "Normalmente em supermercados", "4"=>"Sempre de supermercados", "5"=>""),
     array("q" => "Quantas vezes por ano você compra roupas novas?", "1" => "Nunca", "2" =>"Uma vez por ano", "3"=> "Duas vezes por ano", "4"=>"Três vezes por ano", "5"=>"Uma vez por mês ou mais"),
     array("q" => "Com que frequência você compra equipamentos eletrônicos?", "1" => "somente quando quebram e precisam ser substituídos", "2" =>"ocasionalmente troco por versões mais modernas", "3"=> "troco sempre por aparelhos mais modernos", "4"=>"", "5"=>""),
     array("q" => "Com que frequência você compra livros e jornais?", "1" => "Leio notícias pela internet ou compro livros impressos em papel reciclado", "2" =>"Tenho assinatura mensal de um jornal e geralmente compro algum livro", "3"=> "Compro livros ocasionalmente", "4"=>"Compro livros com frequência", "5"=>""),
     array("q" => "Como você descarta o lixo da sua casa?", "1" => "Materiais eletrônicos encaminhados a postos de recolhimento", "2" =>"Em duas lixeiras", "3"=> "Em uma única lixeira", "4"=>"Não me preocupo em separar", "5"=>""),
     array("q" => "Usa lâmpadas econômicas?", "1" => "Todas as lâmpadas que uso são econômicas", "2" =>"Metade das lâmpadas que uso são econômicas", "3"=> "1/4 das lâmpadas são econômicas", "4"=>"Não", "5"=>""),
     array("q" => "Que meio de transporte você mais usa?", "1" => "Bicicleta ou a pé", "2" =>"Transporte público", "3"=> "Carro, mas procuro andar a pé ou de bicicleta", "4"=>"Carro", "5"=>""),
     array("q" => "Com que frequência você bebe refrigerante?", "1" => "Nunca", "2" =>"Raramente", "3"=> "Ocasionalmente", "4"=>"Frequentemente", "5"=>""),
     array("q" => "Quanto tempo você gasta no banho diariamente?", "1" => "de 5 a 15min", "2" =>"de 16 a 25min", "3"=> "acima de 26min", "4"=>"", "5"=>""),
     array("q" => "Quantas horas você gasta viajando de avião anualmente?", "1" => "Nunca viajo", "2" =>"0 a 4 horas", "3"=> "4 a 10 horas", "4"=>"10 a 25 horas", "5"=>"Mais de 25 horas"),
     array("q" => "Você possui horta na sua casa?", "1" => "Sim", "2" =>"Não", "3"=> "", "4"=>"", "5"=>""),
     array("q" => "Você adota equipamentos que reduzem o consumo de energia em sua residência?", "1" => "Sim", "2" =>"Não", "3"=> "", "4"=>"", "5"=>""),
     array("q" => "Você realiza algum tipo de reaproveitamento da água?", "1" => "Sim", "2" =>"Não", "3"=> "", "4"=>"", "5"=>"")
    );
*/
    // Criando o json
    $dados_json = array(
        'media' => $media_total,
        'lista_medias' => $lista_medias
    );
    
    $json = json_encode($dados_json);
    die($json);
?>
