const next = document.getElementById('next')
const prev = document.getElementById('prev')
const fim = document.getElementById('finalizar')
const barra_resultado = document.getElementById("barra_resultado");
const color_background =  document.getElementById('op1').style.backgroundColor;
var id = 0
//Questão selecionada pega o do do html
var questoes_selecionadas = []
//Lista resopostas pega a quantidade de ponto de cada pergunta
var lista_respostas = []
var opcaoSelecionada = false;

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
    q: "Você usa ar condicionado ou aquecedor na sua casa?",
    a: [{ text: "Sim", ponto: 1, estado: "visible"},
        { text: "Não", ponto: 5, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" },
        { text: "", ponto: 0, estado: "hidden" },
        { text: "", ponto: 0, estado: "hidden" }
    ]

},
{
    q: "Qual a procedência dos alimentos que você consome?",
    a: [{ text: "De minha própria horta", ponto: 5, estado: "visible"  },
        { text: "A maior parte de feiras", ponto: 4, estado: "visible" },
        { text: "Normalmente em supermercados", ponto: 3, estado: "visible" },
        { text: "Sempre de supermercados", ponto: 1, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" }
    ]

},
{
    q: "Quantas vezes por ano você compra roupas novas?",
    a: [{ text: "Nunca", ponto: 6, estado: "visible"  },
        { text: "Uma vez por ano", ponto: 5, estado: "visible"  },
        { text: "Duas vezes por ano", ponto: 4, estado: "visible" },
        { text: "Três vezes por ano", ponto: 2, estado: "visible" },
        { text: "Uma vez por mês ou mais", ponto: 1, estado: "visible" },
    ]

},
{
    q: "Com que frequência você compra equipamentos eletrônicos?",
    a: [{ text: "somente quando quebram e precisam ser substituídos", ponto: 5, estado: "visible"  },
        { text: "ocasionalmente troco por versões mais modernas", ponto: 2, estado: "visible"  },
        { text: "troco sempre por aparelhos mais modernos", ponto: 0, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" },
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
{
    q: "Com que frequência você compra livros e jornais?",
    a: [{ text: "Leio notícias pela internet ou compro livros impressos em papel reciclado", ponto: 5, estado: "visible"  },
        { text: "Tenho assinatura mensal de um jornal e geralmente compro algum livro", ponto: 4, estado: "visible"  },
        { text: "Compro livros ocasionalmente", ponto: 2, estado: "visible" },
        { text: "Compro livros com frequência", ponto: 1, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
{
    q: "Como você descarta o lixo da sua casa?",
    a: [{ text: "Não me preocupo em separar", ponto: 1, estado: "visible"  },
        { text: "Em duas lixeiras", ponto: 4, estado: "visible"  },
        { text: "Materiais eletrônicos encaminhados a postos de recolhimento", ponto: 5, estado: "visible" },
        { text: "Em uma única lixeira", ponto: 1, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
{
    q: "Usa lâmpadas econômicas?",
    a: [{ text: "Não", ponto: 1, estado: "visible"  },
        { text: "1/4 das lâmpadas são econômicas", ponto: 2, estado: "visible"  },
        { text: "Metade das lâmpadas que uso são econômicas", ponto: 4, estado: "visible" },
        { text: "Todas as lâmpadas que uso são econômicas", ponto: 5, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
{
    q: "Que meio de transporte você mais usa?",
    a: [{ text: "Carro", ponto: 1, estado: "visible"  },
        { text: "Bicicleta ou a pé", ponto: 5, estado: "visible"  },
        { text: "Transporte público", ponto: 5, estado: "visible" },
        { text: "Carro, mas procuro andar a pé ou de bicicleta", ponto: 2, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
{
    q: "Com que frequência você bebe refrigerante?",
    a: [{ text: "Nunca", ponto: 5, estado: "visible"  },
        { text: "Raramente", ponto: 4, estado: "visible"  },
        { text: "Ocasionalmente", ponto: 2, estado: "visible" },
        { text: "Frequentemente", ponto: 1, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
{
    q: "Quanto tempo você gasta no banho diariamente?",
    a: [{ text: "acima de 26min", ponto: 1, estado: "visible"  },
        { text: "de 16 a 25min", ponto: 3, estado: "visible"  },
        { text: "de 5 a 15min", ponto: 5, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" },
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
{
    q: "Quantas horas você gasta viajando de avião anualmente?",
    a: [{ text: "Nunca viajo", ponto: 5, estado: "visible"  },
        { text: "0 a 4 horas", ponto: 4, estado: "visible"  },
        { text: "4 a 10 horas", ponto: 3, estado: "visible" },
        { text: "10 a 25 horas", ponto: 2, estado: "visible" },
        { text: "Mais de 25 horas", ponto: 0, estado: "visible" },
    ]

},
{
    q: "Qual a quantidade de alimentos que você consome que contém açúcar refinado?",
    a: [{ text: "Menos de 100g por semana", ponto: 4, estado: "visible"  },
        { text: "Mais de 100g por semana", ponto: 0, estado: "visible"  },
        { text: "Nenhum alimento", ponto: 5, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" },
        { text: "", ponto: 0, estado: "hidden" },
    ]

}
]

/* configurando a resposta de todas as seções, a lista não pode ficar vazia. 
A lista tem que ter a quantidade de elementos igual à de perguntas */
for (let i = 0; i < Questions.length; i++)
{
    questoes_selecionadas.push(0);   
    lista_respostas.push(0);   
}

function pagina_questao(){
    const question = document.getElementById("question");
    const opcoes = document.getElementById("opcoesid");
    const numero_bola = document.getElementById("numero_bola");
    //Modificando os textos
    numero_bola.innerText = (id+1);
    question.innerText = Questions[id].q;
    
    // Concertando a posição do numero bola
    if ((id+1) >= 10){
        numero_bola.style.left = "27%";
    }else{
        numero_bola.style.left = "39%";
    }

    // encaixando as opções grandes no quiz (evitar erros de proporção)
    if (Questions[id].q.length > 39){
        opcoes.style.height = "98%";   
    }else{
        opcoes.style.height = "38%";  
    }
    
    // criando e configurando as alternativas
    for (let i = 1; i < 6; i++)
    {
        const op = document.getElementById('op'+i);
        op.innerText = Questions[id].a[i - 1].text;
        op.style.visibility = Questions[id].a[i - 1].estado;

        op.addEventListener("click", () => {   
            //Modificando a lista com valores
            lista_respostas[id] = Questions[id].a[i - 1].ponto;
            questoes_selecionadas[id] = op.id;
            //Chamando as funções ajustadoras
            botao_esta_selecionado()
            verificar_respostas()
            checagem_botoes()
        })
    }
}

function checagem_botoes(){
    // habilitar/desabilitar next
    if (id + 1 < Questions.length){
        if (questoes_selecionadas[id] == 0){
            next.disabled = true;
            next.style.display = "none";
        }
        else{
        next.disabled = false;
        next.style.display = "block";
        }
    }
    else{
        next.disabled = true;
        next.style.display = "none";
    }

    // habilitar/desabilitar prev
    if (id == 0){
        prev.disabled = true;
        prev.style.display = "none";
    }
    else{
        prev.disabled = false;
        prev.style.display = "block";
        prev.style.cursor = "pointer";
    }
    
}

verificar_respostas();
troca_pergunta()

next.addEventListener("click", passar)

prev.addEventListener("click", voltar)

fim.addEventListener("click", finalizar)

function passar(){
    id++;
    troca_pergunta()
}

function voltar(){
    id--;
    troca_pergunta()
}

function finalizar(){
    var somatorioLista = 0;
    for (let i = 0; i < Questions.length; i++){
    somatorioLista += lista_respostas[i]
    }
    // Redirecionando a página
    location.href="resultado.html?total="+somatorioLista;
}

function verificar_respostas(){
    // Se na lista inclui 0, significa que nem todas as perguntas foram respondidas
    if (questoes_selecionadas.includes(0)){
        fim.disabled = true
        fim.style.display = "none";
    }
    else{
        fim.disabled = false
        fim.style.display = "block";
        fim.style.cursor = "pointer";
    }
}

function botao_esta_selecionado(){
    opcao = "op"
    for (let i = 1; i < 6; i++){
        if (opcao+i == questoes_selecionadas[id]){
            document.getElementById('op'+i).style.backgroundColor = "#EBEBEB"
        }
        else{
            document.getElementById('op'+i).style.backgroundColor = color_background
        }}
}

function troca_pergunta(){
    barra_resultado.style.width = (((id+1)/14)*100)+"%";
    pagina_questao();
    checagem_botoes();
    botao_esta_selecionado();
}
