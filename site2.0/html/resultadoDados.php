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

    // Criando o json
    $dados_json = array(
        'media' => $media_total,
        'lista_medias' => $lista_medias
    );
    
    $json = json_encode($dados_json);
    die($json);
?>
