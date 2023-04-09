const irInicio = document.getElementById("irInicio");
const irResultado = document.getElementById("RefazerQuiz");

irInicio.addEventListener('click', ir_inicio)
irResultado.addEventListener('click', ir_resultado)

function ir_inicio(){
    location.href = "./index.html"
}

function ir_resultado(){
    location.href = "./resultado.html"
}