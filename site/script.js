const next = document.getElementById('next')
const prev = document.getElementById('prev')
const fim = document.getElementById('finalizar')
var id = 0
var lista_respostas = []

// questõs que vão ser perguntadas
const Questions = [{
    q: "Com que frequência você come carne vermelha?",
    a: [{ text: "Nunca", ponto: 5, estado: "visible" },
        { text: "três porções por semana", ponto: 5, estado: "visible" },
        { text: "uma porção por dia", ponto: 4, estado: "visible" },
        { text: "Frequentemente", ponto: 1, estado: "visible" },
        { text: "Sempre", ponto: 0, estado: "visible" }
    ]

},
{
    q: "Com que frequência você come peixe ou frutos do mar?",
    a: [{ text: "Nunca", ponto: 5, estado: "visible"  },
        { text: "Raramente", ponto: 5, estado: "visible" },
        { text: "Ocasionalmente", ponto: 4, estado: "visible" },
        { text: "Frequentemente", ponto: 3, estado: "visible" },
        { text: "", ponto: 1, estado: "hidden" }
    ]

},
{
    q: "Você usa ar condicionado ou aquecedor em sua casa?",
    a: [{ text: "Sim", ponto: 1, estado: "visible"},
        { text: "Não", ponto: 5, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" },
        { text: "", ponto: 0, estado: "hidden" },
        { text: "", ponto: 0, estado: "hidden" }
    ]

}
]

/* configurando a resposta de todas as seções, a lista não pode ficar vazia. 
A lista tem que ter a quantidade de elementos igual à de perguntas */
for (let i = 0; i < Questions.length; i++)
{
    lista_respostas.push(0)   
}

// função de iterar as questões
function iterate(){
    const question = document.getElementById("question");

    question.innerText = Questions[id].q;

    // criando e configurando as alternativas
    for (let i = 1; i < 6; i++)
    {
        const op = document.getElementById('op'+i);
        op.innerText = Questions[id].a[i - 1].text;
        op.style.visibility = Questions[id].a[i - 1].estado;
        op.addEventListener("click", () => {   
            lista_respostas[id] = Questions[id].a[i - 1].ponto;
        })
    }

}
function checagem_botoes(){
    // habilitar/desabilitar next
    if (id + 1 < Questions.length){
        next.disabled = false;
    }
    else{
        next.disabled = true;
    }

    // habilitar/desabilitar prev
    if (id == 0){
        prev.disabled = true;
    }
    else{
        prev.disabled = false;
    }

    // habilitar/desabilitar finalizar
    if (id ==  Questions.length - 1){
        fim.disabled = false
    }
    else{
        fim.disabled = true
    }
}
iterate()
checagem_botoes()

next.addEventListener("click", passar)

prev.addEventListener("click", voltar)

fim.addEventListener("click", finalizar)

function passar(){
    id++;
    iterate();
    checagem_botoes();
}

function voltar(){
    id--;
    iterate();
    checagem_botoes();
}

function finalizar(){
    var somatorioLista = 0;
    for (let i = 0; i < Questions.length; i++){
    somatorioLista += lista_respostas[i]
    }
    console.log(somatorioLista)
}