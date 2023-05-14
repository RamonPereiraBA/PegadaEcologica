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
        { text: "três porções por semana", ponto: 4, estado: "visible" },
        { text: "uma porção por dia", ponto: 2, estado: "visible" },
        { text: "Frequentemente", ponto: 1, estado: "visible" },
        { text: "Sempre", ponto: 0, estado: "visible" }
    ]

},
{
    q: "Com que frequência você come peixe ou frutos do mar?",
    a: [{ text: "Nunca", ponto: 5, estado: "visible"  },
        { text: "Raramente", ponto: 4, estado: "visible" },
        { text: "Ocasionalmente", ponto: 3, estado: "visible" },
        { text: "Frequentemente", ponto: 2, estado: "visible" },
        { text: "", ponto: 1, estado: "hidden" }
    ]

},
{
    q: "Você usa ar condicionado ou aquecedor na sua casa?",
    a: [{ text: "Sim", ponto: 1, estado: "visible"},
        { text: "Não", ponto: 4, estado: "visible" },
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
    a: [{ text: "Nunca", ponto: 5, estado: "visible"  },
        { text: "Uma vez por ano", ponto: 5, estado: "visible"  },
        { text: "Duas vezes por ano", ponto: 4, estado: "visible" },
        { text: "Três vezes por ano", ponto: 2, estado: "visible" },
        { text: "Uma vez por mês ou mais", ponto: 1, estado: "visible" },
    ]

},
{
    q: "Com que frequência você compra equipamentos eletrônicos?",
    a: [{ text: "somente quando quebram e precisam ser substituídos", ponto: 4, estado: "visible"  },
        { text: "ocasionalmente troco por versões mais modernas", ponto: 2, estado: "visible"  },
        { text: "troco sempre por aparelhos mais modernos", ponto: 0, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" },
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
{
    q: "Com que frequência você compra livros e jornais?",
    a: [{ text: "Leio notícias pela internet ou compro livros impressos em papel reciclado", ponto: 4, estado: "visible"  },
        { text: "Tenho assinatura mensal de um jornal e geralmente compro algum livro", ponto: 3, estado: "visible"  },
        { text: "Compro livros ocasionalmente", ponto: 2, estado: "visible" },
        { text: "Compro livros com frequência", ponto: 1, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
{
    q: "Como você descarta o lixo da sua casa?",
    a: [{ text: "Materiais eletrônicos encaminhados a postos de recolhimento", ponto: 4, estado: "visible" },
        { text: "Em duas lixeiras", ponto: 3, estado: "visible"  },
        { text: "Em uma única lixeira", ponto: 1, estado: "visible" },
        { text: "Não me preocupo em separar", ponto: 1, estado: "visible"  },
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
{
    q: "Usa lâmpadas econômicas?",
    a: [{ text: "Todas as lâmpadas que uso são econômicas", ponto: 4, estado: "visible" },
        { text: "Metade das lâmpadas que uso são econômicas", ponto: 3, estado: "visible" },
        { text: "1/4 das lâmpadas são econômicas", ponto: 2, estado: "visible" },
        { text: "Não", ponto: 1, estado: "visible"},
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
{
    q: "Que meio de transporte você mais usa?",
    a: [{ text: "Bicicleta ou a pé", ponto: 5, estado: "visible"  },
        { text: "Transporte público", ponto: 5, estado: "visible" },
        { text: "Carro, mas procuro andar a pé ou de bicicleta", ponto: 2, estado: "visible" },
        { text: "Carro", ponto: 1, estado: "visible"  },
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
{
    q: "Com que frequência você bebe refrigerante?",
    a: [{ text: "Nunca", ponto: 4, estado: "visible"  },
        { text: "Raramente", ponto: 3, estado: "visible"  },
        { text: "Ocasionalmente", ponto: 2, estado: "visible" },
        { text: "Frequentemente", ponto: 1, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
{
    q: "Quanto tempo você gasta no banho diariamente?",
    a: [{ text: "de 5 a 15min", ponto: 4, estado: "visible" },
        { text: "de 16 a 25min", ponto: 3, estado: "visible"  },
        { text: "acima de 26min", ponto: 1, estado: "visible"  },
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
    q: "Você possui horta na sua casa?",
    a: [{ text: "Sim", ponto: 4, estado: "visible" },
        { text: "Não", ponto: 2, estado: "visible"  },
        { text: "", ponto: 0, estado: "hidden"  },
        { text: "", ponto: 0, estado: "hidden" },
        { text: "", ponto: 0, estado: "hidden" },
    ]
},
{
    q: "Você usa equipamentos que reduzem o consumo de água ou energia?",
    a: [{ text: "Sim", ponto: 4, estado: "visible" },
        { text: "Não", ponto: 2, estado: "visible"  },
        { text: "", ponto: 0, estado: "hidden"  },
        { text: "", ponto: 0, estado: "hidden" },
        { text: "", ponto: 0, estado: "hidden" },
    ]
},
{
    q: "Você realiza algum tipo de reaproveitamento da água?",
    a: [{ text: "Sim", ponto: 4, estado: "visible" },
        { text: "Não", ponto: 2, estado: "visible"  },
        { text: "", ponto: 0, estado: "hidden"  },
        { text: "", ponto: 0, estado: "hidden" },
        { text: "", ponto: 0, estado: "hidden" },
    ]
}
]

/* configurando a resposta de todas as seções, a lista não pode ficar vazia. 
A lista tem que ter a quantidade de elementos igual à de perguntas */
// for (let i = 0; i < Questions.length; i++)
// {
//     questoes_selecionadas.push(0);   
//     lista_respostas.push(0);   
// }
Questions.forEach(() => { // se quiser, remove esse foreach e revive o bloco acima
    questoes_selecionadas.push(0);   
    lista_respostas.push(0); 
});

function pagina_questao(){
    const question = document.getElementById("question");
    const numero_bola = document.getElementById("numero_bola");
    //Modificando os textos
    numero_bola.innerText = (id+1);
    question.innerText = Questions[id].q;
    
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
    // // habilitar/desabilitar next
    // if (id + 1 < Questions.length){
    //     if (questoes_selecionadas[id] == 0){
    //         next.disabled = true;
    //         next.style.display = "none";
    //     }
    //     else{
    //     next.disabled = false;
    //     next.style.display = "block";
    //     }
    // }
    // else{
    //     next.disabled = true;
    //     next.style.display = "none";
    // }

    // // habilitar/desabilitar prev
    // if (id == 0){
    //     prev.disabled = true;
    //     prev.style.display = "none";
    // }
    // else{
    //     prev.disabled = false;
    //     prev.style.display = "block";
    //     prev.style.cursor = "pointer";
    // }
    // habilitar/desabilitar next
    if (id + 1 < Questions.length) { // o user não chegou na última questão
        next.disabled = (questoes_selecionadas[id] === 0); // o user não selecionou alguma alternativa?
        next.style.display = (next.disabled) ? "none" : "block";
    } else { // o user está na última questão
        next.disabled = true;
        next.style.display = "none";
    }

    // habilitar/desabilitar prev
    prev.disabled = (id === 0);
    prev.style.display = (prev.disabled) ? "none" : "block";  
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
    var dicaurl = "d";
    var questoes_juntas = "";
    // for (let i = 0; i < Questions.length; i++){
    //     somatorioLista += lista_respostas[i];
    //     questoes_juntas += (questoes_selecionadas[i].slice(-1));
    // }
    Questions.forEach(() => { // se quiser, remove esse foreach e revive o bloco acima
        somatorioLista += lista_respostas[i];
        questoes_juntas += (questoes_selecionadas[i].slice(-1));
    });

    // Analizando o resultado
    alimentos = [parseInt(questoes_selecionadas[0].slice(-1))>3, parseInt(questoes_selecionadas[1].slice(-1))>2, 
                parseInt(questoes_selecionadas[3].slice(-1))>2, parseInt(questoes_selecionadas[13].slice(-1))>2]
    
    lixos = [parseInt(questoes_selecionadas[4].slice(-1))>2, parseInt(questoes_selecionadas[5].slice(-1))>1, 
                parseInt(questoes_selecionadas[6].slice(-1))>1, parseInt(questoes_selecionadas[7].slice(-1))>3]
    
    energia = [parseInt(questoes_selecionadas[2].slice(-1))>1, parseInt(questoes_selecionadas[8].slice(-1))>2,
                parseInt(questoes_selecionadas[9].slice(-1))>2, parseInt(questoes_selecionadas[12].slice(-1))>3]
    
    // Cada parametro será representado por uma letra
    if (verificar_repeticoes(alimentos)){
        dicaurl = dicaurl+"A";
    }
    if (verificar_repeticoes(lixos)){
        dicaurl = dicaurl+"L";
    }
    if (verificar_repeticoes(energia)){
        dicaurl = dicaurl+"E";
    }

    // Redirecionando a página
    location.href="passagemDados.php?total="+somatorioLista+"&dica="+dicaurl+"&questoes="+questoes_juntas;
}

// Função EXCLUSIVA da função finalizar
function verificar_repeticoes(lista_repeticoes){
    var repetido;
    for (let a = 0; a < lista_repeticoes.length; a++){
        if (lista_repeticoes[a] && repetido){
            return true;
        }
        if (lista_repeticoes[a]){
            repetido = true;
        }
    }
    return false;
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
    barra_resultado.style.width = (((id+1)/16)*100)+"%";
    pagina_questao();
    checagem_botoes();
    botao_esta_selecionado();
}
