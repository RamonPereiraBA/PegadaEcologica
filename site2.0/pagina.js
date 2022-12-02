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

// configurando a função de rolar a tela, é preciso diminuir em 30 para ajustar a posição
const lista_posicoes = [
    parseInt(window.getComputedStyle(document.getElementById("inicio")).top) - 30,
    parseInt(window.getComputedStyle(document.getElementById("objetivo")).top) - 30,
    parseInt(window.getComputedStyle(document.getElementById("pilares")).top) - 30,
    parseInt(window.getComputedStyle(document.getElementById("equipe")).top) - 30,
    parseInt(window.getComputedStyle(document.getElementById("pagina_quiz")).top) - 30,
];

function rolar_pagina(lugar){
    window.scroll({top: lista_posicoes[lugar], behavior: "smooth"})
}

// configurando o dropdown
const botao_ir_objetivo = document.getElementById("ir_objetivo")
const botao_ir_pilar = document.getElementById("ir_pilares")
const botao_ir_equipe = document.getElementById("ir_equipe")

botao_ir_objetivo.addEventListener('click', ()=> rolar_pagina(1))
botao_ir_pilar.addEventListener('click', ()=> rolar_pagina(2))
botao_ir_equipe.addEventListener('click', ()=> rolar_pagina(3))

// configurando a seta final
const seta_cima = document.getElementById("seta_cima")
seta_cima.addEventListener('click', ()=> rolar_pagina(0))

// configurando o botão inicial
const botao_inicial = document.getElementById("btn_começar");
botao_inicial.addEventListener('click', () => rolar_pagina(4))

// Criando as caixas dos pilares
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