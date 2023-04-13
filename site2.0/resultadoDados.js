// Pegando os parametros
const urlParams = new URLSearchParams(window.location.search);
var resultado = urlParams.get('total');
var dicaURL = urlParams.get('dica');

///////////////////////////////////////////////////////////
const irInicio = document.getElementById("irInicio");
const irResultado = document.getElementById("RefazerQuiz");

irInicio.addEventListener('click', ir_inicio)
irResultado.addEventListener('click', ir_resultado)

function ir_inicio(){
    location.href = "./index.html"
}

function ir_resultado(){
    location.href = "./resultado.html?total="+resultado+"&dica="+dicaURL;
}

///////////////////////////////////////////////////////
var mediaGlobal = document.getElementById("numero_media");
var numeroMediGlobal = parseInt(mediaGlobal.innerText);
if (numeroMediGlobal >= 50){
    document.documentElement.style.setProperty('--cor_caixa_titulo', '#D2F20C');
    document.documentElement.style.setProperty('--cor_caixa_resultado', '#C43302');
    document.documentElement.style.setProperty('--cor_titulo_resultado', '#010221');
    document.documentElement.style.setProperty('--cor_caixa_geral', '#AEF477');

}else if (numeroMediGlobal >= 35 && numeroMediGlobal <= 49){
    document.documentElement.style.setProperty('--cor_caixa_titulo', '#FFAE00');
    document.documentElement.style.setProperty('--cor_caixa_resultado', '#C43302');
    document.documentElement.style.setProperty('--cor_titulo_resultado', '#010221');
    document.documentElement.style.setProperty('--cor_caixa_geral', '#B7BF99');
}else{
    document.documentElement.style.setProperty('--cor_caixa_titulo', '#D92929');
    document.documentElement.style.setProperty('--cor_caixa_resultado', '#260101');
    document.documentElement.style.setProperty('--cor_titulo_resultado', '#010221');
    document.documentElement.style.setProperty('--cor_caixa_geral', '#B0BFBE');
}
