// Criando as ciaxas dos pilares
const cores_caixa = ["#45C4B0ed", "#DAFDBA", "#45C4B0", "#DAFDBA"]
const posicoes_caixa = ["140px", "380px", "620px", "860px"]

function criar_caixa_pilar(){
    for (let x = 1; x < 5; x++){
        const caixa = document.getElementById('caixa'+x);
        caixa.style.backgroundColor = cores_caixa[x-1]
        caixa.style.top = posicoes_caixa[x-1]
        if (x===2 ||x===4){
            caixa.style.right = 0;
        }
    }
}

// configurando o botão iniciar quiz
const botao_quiz = document.getElementById("inicializador");
botao_quiz.addEventListener("click", ir_quiz)

function ir_quiz(){
    location.href="quiz.html"
}

// configurando o botão do tema
const toggle = document.getElementById("simbolo_tema");
const barra = document.getElementById('barra')

toggle.addEventListener('click', mudar_tema)

function mudar_tema(){
    this.classList.toggle('bi-moon');
    if(this.classList.toggle('bi-brightness-high-fill')){
        barra.style.backgroundColor = '#ebebeb'
    }else{
        barra.style.backgroundColor = '#000000'
    }
}