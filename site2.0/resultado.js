// redirecionando a pagina
const bt_inicio = document.getElementById("ir_inicio")
const bt_quiz = document.getElementById("ir_quiz")
const bt_compartilhar = document.getElementById("ir_compartilhar");

bt_inicio.addEventListener('click', ir_inicio)
bt_quiz.addEventListener('click', ir_quiz)
bt_compartilhar.addEventListener('click', colar_texto)

function ir_inicio(){
    location.href = "./index.html"
}

function ir_quiz(){
    location.href = "./quiz.html"
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
const imagem_fundo = document.getElementById("imagem_fundo");
var dicaCor;

texto_resultado.innerText = resultado;

let texto;
let texto_dica;
let dica_esta_ativa = false;
let qualidade_resultado;

// chegando o resultado
if (resultado >= 50)
{
    qualidade_resultado = "Excelente";
    texto = "Parabéns!! Você está antenado com as questões ambientais e busca ter qualidade de vida sem agredir o meio ambiente.";
    imagem_fundo.setAttribute('src', "../Imagens/imagens_fundo/FundoEx.png");
    dica.style.visibility = 'hidden'
    barra_resultado.classList.add("bg-success");
}

else if (resultado >= 35 && resultado <= 49)
{
    qualidade_resultado = "Moderada";
    texto = "Sua pegada é moderada. Seu estilo de vida está um pouco acima da capacidade natural de regeneração do planeta, de modo que seu consumo demanda mais do que a Terra pode repor.";
    texto_dica = "Dica: Procure fazer a pé ou de bicicleta os percursos curtos do dia a dia, como: ir à padaria, academia ou farmácia no seu bairro. Utilize o carro somente para percursos longos.";
    imagem_fundo.setAttribute('src', "../Imagens/imagens_fundo/FundoM.png");
    dica.addEventListener('click', setar_dica);
    document.documentElement.style.setProperty('--cor_caixa_titulo', '#FFAE00');
    document.documentElement.style.setProperty('--cor_caixa_resultado', '#C43302');
    document.documentElement.style.setProperty('--cor_titulo_resultado', '#010221');
    document.documentElement.style.setProperty('--cor_caixa_geral', '#B7BF99');
    barra_resultado.classList.add("bg-warning");
}

else
{
    qualidade_resultado = "Péssimo";
    texto = "Você vive de forma insustentável, pois demanda demais do que a capacidade natural de regeneração do planeta.";
    texto_dica = "Dica: Verifique se o produto antigo não atende às suas necessidades e, se estiver quebrado ou com problemas. Separe o lixo para reciclagem e confira como funciona a coleta seletiva na sua cidade. Transportes alternativos, como bicicletas e caminhada reduzem a emissão de gases.";
    imagem_fundo.setAttribute('src', "../Imagens/imagens_fundo/FundoR.png");
    dica.addEventListener('click', setar_dica)
    document.documentElement.style.setProperty('--cor_caixa_titulo', '#D92929');
    document.documentElement.style.setProperty('--cor_caixa_resultado', '#260101');
    document.documentElement.style.setProperty('--cor_titulo_resultado', '#010221');
    document.documentElement.style.setProperty('--cor_caixa_geral', '#B0BFBE');
    barra_resultado.classList.add("bg-danger");    
}

titulo.innerText = qualidade_resultado;   
texto_geral.innerText = texto;
// a formula a baixo ajusta a porcentagem, pois o maior resultado possível é 70
barra_resultado.style.width = parseInt((parseInt(resultado)*100)/70)+"%";
dicaCor = dica.style.color
texto.wordBreak = true;


// configurando a dica
function setar_dica(){
    if (!dica_esta_ativa){
        dica.innerText = "Retornar"
        texto_geral.innerText = texto_dica;
        dica_esta_ativa = true;
    }else{
        dica.innerText = "Quer uma dica?"
        texto_geral.innerText = texto;
        dica_esta_ativa = false;
    }
}

// quando o mouse ficar em cima do botão
dica.onmouseover = function() {
        dica.style.color = "#FFFF"
}

// quando o mouse sair do botão
dica.onmouseout = function() {
    dica.style.color = dicaCor
}

// Função para o botão compartilhar
function colar_texto(){
    navigator.clipboard.writeText(`Minha pegada ecológica é ${qualidade_resultado}, ${resultado} em uma escala de 70. Mas e você? Como está sua pegada ecológica? Descubra acessando https://greenlight.dev.br/`);
    alert(`O texto "Minha pegada ecológica é ${qualidade_resultado}, ${resultado} em uma escala de 70. Mas e você? Como está sua pegada ecológica? Descubra acessando https://greenlight.dev.br/" foi copiado`);
}
