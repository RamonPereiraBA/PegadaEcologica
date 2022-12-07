// redirecionando a pagina
const bt_inicio = document.getElementById("ir_inicio")
const bt_quiz = document.getElementById("ir_quiz")

bt_inicio.addEventListener('click', ir_inicio)
bt_quiz.addEventListener('click', ir_quiz)

function ir_inicio(){
    location.href = "index.html"
}

function ir_quiz(){
    location.href = "quiz.html"
}

// configurando a tela do resultado
// declarando as variaveis
const urlParams = new URLSearchParams(window.location.search);
var resultado = urlParams.get('total');

if (resultado === null || resultado===""){
    resultado = 0;
}

const titulo = document.getElementById("titulo_resultado");
const texto_resultado = document.getElementById("resultado");
const texto_geral = document.getElementById("texto_geral");
const dica = document.getElementById('dica');
const barra_resultado = document.getElementById("barra_resultado");

texto_resultado.innerText = resultado;

let texto;
let texto_dica;
let dica_esta_ativa = false;

// chegando o resultado
if (resultado >= 50){
    titulo.innerText = "Excelente";
    texto = "Se você fez de 50 a 70 pontos, Parabéns!! Você está antenado com as questões ambientais e busca ter qualidade de vida sem agredir o meio ambiente.";
    dica.style.visibility = 'hidden'
    barra_resultado.classList.add("bg-success");
}else if (resultado >= 35 && resultado <= 49){
    titulo.innerText = "Moderada";
    texto = "Se você fez de 35 a 49 pontos, sua pegada é moderada. Seu estilo de vida está um pouco acima da capacidade natural de regeneração de recursos pelo planeta, de modo que seu padrão de consumo demanda moderadamente mais do que a Terra pode repor.";
    texto_dica = "Dica: Procure fazer a pé ou de bicicleta os percursos curtos do dia a dia, como: ir à padaria, academia ou farmácia no seu bairro. Utilize o carro somente para percursos longos.";
    dica.addEventListener('click', setar_dica);
    document.documentElement.style.setProperty('--cor_caixa_titulo', '#FFAE00');
    document.documentElement.style.setProperty('--cor_caixa_resultado', '#C43302');
    barra_resultado.classList.add("bg-warning");
}else
{
    titulo.innerText = "Péssimo";   
    texto = "Se você fez menos de 35 pontos, precisa rever seus hábitos de consumo! Você vive de forma insustentável, pois demanda demais do que a capacidade natural de regeneração do planeta.";
    texto_dica = "Dica: Verifique se o produto antigo não atende às suas necessidades e, se estiver quebrado ou com problemas. Separe o lixo para reciclagem - não custa nada! Confira como funciona a coleta seletiva na sua cidade, fique atento às datas. Transportes alternativos, como bicicletas e até uma boa caminhada reduzem a emissão de gases.";
    dica.addEventListener('click', setar_dica)
    document.documentElement.style.setProperty('--cor_caixa_titulo', '#D92929');
    document.documentElement.style.setProperty('--cor_caixa_resultado', '#260101');
    barra_resultado.classList.add("bg-danger");    
}
texto_geral.innerText = texto;
// a formula a baixo ajusta a porcentagem, pois o maior resultado possível é 70
barra_resultado.style.width = parseInt((parseInt(resultado)*100)/70)+"%";

// configurando a dica
function setar_dica(){
    if (!dica_esta_ativa){
        texto_geral.innerText = texto_dica;
        dica_esta_ativa = true;
    }else{
        texto_geral.innerText = texto;
        dica_esta_ativa = false;
    }
}
