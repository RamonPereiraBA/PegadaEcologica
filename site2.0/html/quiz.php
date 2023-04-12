<?php
require('../conexao_servidor.php');

$stmt = $conn->prepare("SELECT * from tabelaecologica");
$stmt->execute();
$results1 = $stmt->fetchAll(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Quiz</title>
	<!--Bootstrap-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<!--imagens-->
	<link rel="icon" href="../Imagens/interrogacao.png">

	<!--Fontes-->
	<link rel="stylesheet" href="../css/quiz.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&display=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cabin:wght@500&family=Montserrat:wght@700&display1=swap" rel="stylesheet">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>
<div class="bg">
<body>
	<div class="painel">
		<!--Barra de progresso-->
		<div class="progress" style="height: 15px; width: 100%; left: 0%; border-radius: 0; background:#012030;">
            <div class="progress-bar" id="barra_resultado" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="background: #a4c43b;"></div>
        </div>

		<div id="bola_numero"><div id="numero_bola">1</div></div>
		<div id="question" class="perguntas" >
			Pergunta vem aqui.
		</div>
		<div class="opcoes" id="opcoesid">
			<button class="option" id="op1" >opção1</button>
	
			<button class="option" id="op2" >opção2</button>
	
			<button class="option" id="op3">opção3</button>
	
			<button class="option" id="op4">opção4</button>

            <button class="option" id="op5">opção5</button>
		</div>
		<div class="navegacao">
			<button id="prev">Anterior</button>
			<button id="next">Próximo</button>
			<button id="finalizar" class="enviarPesquisa" onclick="<?php inserirDados('valor_do_parametro'); ?>">Executar função</button>
		</div>
	</div>
	<script src="../quiz.js"></script>
</body>
</div>
</html>
<?php 
function inserirDados(){
	echo '<script>finalizar();</script>';
}
?>
