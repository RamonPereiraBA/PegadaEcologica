// Animação de aparecer
const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('show_animacao');
        }
    });
});

const hiddenElements = document.querySelectorAll('.hidden');
hiddenElements.forEach((el) => observer.observe(el));

// outra animação
const observer2 = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            entry.target.classList.add('focar');
        }
    });
});
const elementos_lista_focar = document.querySelectorAll('.card');
elementos_lista_focar.forEach((el) => observer2.observe(el));

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
// configurando a função de rolar a tela
const lista_lugares = [
    document.getElementById("inicio"),
    document.getElementById("objetivo"),
    document.getElementById("pilares"),
    document.getElementById("equipe"),
    document.getElementById("desenvolvedores"),
    document.getElementById("pagina_quiz"),
];
// é preciso diminuir em 30 para ajustar a posição
const lista_posicoes = [
    parseInt(window.getComputedStyle(document.getElementById("inicio")).top) - 30,
    parseInt(window.getComputedStyle(document.getElementById("objetivo")).top) - 30,
    parseInt(window.getComputedStyle(document.getElementById("pilares")).top) - 30,
    parseInt(window.getComputedStyle(document.getElementById("equipe")).top) - 30,
    parseInt(window.getComputedStyle(document.getElementById("desenvolvedores")).top) - 30,
    parseInt(window.getComputedStyle(document.getElementById("pagina_quiz")).top) - 30,
];

function rolar_pagina(lugar){
    window.scroll({top: lista_posicoes[lugar], behavior: "smooth"})
    lista_lugares[lugar].style.animation = "";
    setTimeout(() => lista_lugares[lugar].style.animation = "destaque_pagina 0.5s linear", 500);
}

// configurando o dropdown
const botao_ir_objetivo = document.getElementById("ir_objetivo")
const botao_ir_pilar = document.getElementById("ir_pilares")
const botao_ir_equipe = document.getElementById("ir_equipe")
const botao_ir_desenvolvedores = document.getElementById("ir_desenvolvedores")

botao_ir_objetivo.addEventListener('click', ()=> rolar_pagina(1))
botao_ir_pilar.addEventListener('click', ()=> rolar_pagina(2))
botao_ir_equipe.addEventListener('click', ()=> rolar_pagina(3))
botao_ir_desenvolvedores.addEventListener('click', ()=> rolar_pagina(4))

// configurando a seta final
const seta_cima = document.getElementById("seta_cima")
seta_cima.addEventListener('click', ()=> rolar_pagina(0))

// configurando o botão inicial
const botao_inicial = document.getElementById("btn_começar");
botao_inicial.addEventListener('click', () => rolar_pagina(5))

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Mudando a cor da nav bar
const lista_cores_navbar = ['#9FC131', '#042940', '#13678A', '#9AEBA3', '#45C4B0', '#042940']
const navbar = document.getElementById('navBar');

const lista_cores_insta = ['#212529', '#B2CFE1', '#5E8CD6', '#3F8F48', '#786624']
const instaVetor = document.getElementById("instaVetor")

function mudar_cor_navbar() {
    for (let x=0; x<5;x++)
    {
        if(window.scrollY >= lista_posicoes[x]) /// 
        {
            navbar.style.backgroundColor = lista_cores_navbar[x]; // muda as cores
            instaVetor.style.color = lista_cores_insta[x]
        }
        else
        {
            return;
        }
    }
}

mudar_cor_navbar();

setInterval(mudar_cor_navbar, 1500);

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Criando as caixas dos pilares
const cores_caixa = ["#45C4B0ed", "#DAFDBA", "#45C4B0", "#DAFDBA"]
const posicoes_caixa = ["140px", "440px", "740px", "1040px"]

function criar_caixa_pilar(){
    for (let x = 1; x < 5; x++){
        const caixa = document.getElementById('caixa'+x);
        caixa.style.backgroundColor = cores_caixa[x-1]
        caixa.style.top = posicoes_caixa[x-1]
        if (x===2 ||x===4){
            caixa.style.right = 0;
            caixa.style.borderTopLeftRadius = "20px";
            caixa.style.borderBottomLeftRadius = "20px";
        }else{
            caixa.style.borderTopRightRadius = "20px";
            caixa.style.borderBottomRightRadius = "20px";
        }
    }
}

///////////////////////////////////////////////////////////////////////////////////////////////////////////////
// configurando o botão iniciar quiz
const botao_quiz = document.getElementById("inicializador");
botao_quiz.addEventListener("click", ir_quiz)

function ir_quiz(){
    location.href="quiz.html"
}
