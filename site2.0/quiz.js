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
    q: "Com que frequência você consome alimentos cultivados localmente? ",
    a: [{ text: "Diariamente", ponto: 5, estado: "visible" },
        { text: "Eventualmente", ponto: 4, estado: "visible" },
        { text: "Nunca", ponto: 2, estado: "visible" },
        { text: "", ponto: 0, estado: "visible" },
        { text: "", ponto: 0, estado: "visible" }
    ]

},
{
    q: "Você possui horta em sua residência? (No solo ou em vasos)",
    a: [{ text: "Sim", ponto: 5, estado: "visible"  },
        { text: "Não", ponto: 2, estado: "visible" },
        { text: "", ponto: 0, estado: "visible" },
        { text: "", ponto: 0, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" }
    ]

},
{
    q: "Com que frequência você consome produtos embalados ou processados?",
    a: [{ text: "Diariamente", ponto: 2, estado: "visible"},
        { text: "Eventualmente", ponto: 3, estado: "visible" },
        { text: "Nunca", ponto: 5, estado: "hidden" },
        { text: "", ponto: 0, estado: "hidden" },
        { text: "", ponto: 0, estado: "hidden" }
    ]

},
{
    q: "Qual o meio de transporte que você mais usa?",
    a: [{ text: "Automóvel próprio", ponto: 2, estado: "visible"},
        { text: "Automóvel de terceiros (locado ou aplicativo)", ponto: 3, estado: "visible" },
        { text: "Automóvel de terceiros (carona)", ponto: 3, estado: "hidden" },
        { text: "Motocicleta própria", ponto: 4, estado: "hidden" },
        { text: "Motocicleta de terceiros (locado ou aplicativo)", ponto: 5, estado: "hidden" }
    ]

},
{
    q: "Você adota equipamentos e tecnologias que reduzem o consumo de água e/ou energia em sua residência?",
    a: [{ text: "Sim", ponto: 5, estado: "visible"  },
        { text: "Não", ponto: 0, estado: "visible" },
        { text: "", ponto: 0, estado: "visible" },
        { text: "", ponto: 0, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" }
    ]

},
{
    q: "Quanto tempo você gasta no banho diariamente?", 
    a: [{ text: "5 a 10 min", ponto: 5, estado: "visible"  },
        { text: "11 a 25 min", ponto: 4, estado: "visible"  },
        { text: "26 a 35 min", ponto: 3, estado: "visible" },
        { text: "Acima de 35 min", ponto: 2, estado: "visible" },
        { text: "", ponto: 0, estado: "visible" },
    ]

},
{
    q: "Quando você compra equipamentos eletrônicos?",
    a: [{ text: "Somente quando quebram e precisam ser substituídos", ponto: 5, estado: "visible"  },
        { text: "Ocasionalmente troco por versões mais modernas", ponto: 3, estado: "visible"  },
        { text: "Troco sempre por aparelhos mais modernos", ponto: 0, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" },
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
{
    q: "Quando você compra produtos e/ou equipamentos você busca informações sobre a adoção de medidas sustentáveis por parte da empresa?",
    a: [{ text: "Sim", ponto: 5, estado: "visible"  },
        { text: "Não", ponto: 0, estado: "visible"  },
        { text: "", ponto: 0, estado: "visible" },
        { text: "", ponto: 0, estado: "visible" },
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
{
    q: "Você pratica a coleta seletiva na sua residência?",
    a: [{ text: "Sim", ponto: 5, estado: "visible" },
        { text: "Não", ponto: 0, estado: "visible"  },
        { text: "", ponto: 0, estado: "visible" },
        { text: "", ponto: 0, estado: "visible"  },
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
{
    q: "Você realiza a compostagem na sua residência?",
    a: [{ text: "Sim", ponto: 5, estado: "visible" },
        { text: "Não", ponto: 0, estado: "visible"  },
        { text: "", ponto: 0, estado: "visible" },
        { text: "", ponto: 0, estado: "visible"  },
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
{
    q: "Você realiza algum tipo de reaproveitamento de água? (De chuva, de máquina de lavar roupa, outros)",
    a: [{ text: "Sim", ponto: 5, estado: "visible" },
        { text: "Não", ponto: 0, estado: "visible"  },
        { text: "", ponto: 0, estado: "visible" },
        { text: "", ponto: 0, estado: "visible"  },
        { text: "", ponto: 0, estado: "hidden" },
    ]

},
// {
//     q: "Com que frequência você bebe refrigerante?",
//     a: [{ text: "Nunca", ponto: 4, estado: "visible"  },
//         { text: "Raramente", ponto: 3, estado: "visible"  },
//         { text: "Ocasionalmente", ponto: 2, estado: "visible" },
//         { text: "Frequentemente", ponto: 1, estado: "visible" },
//         { text: "", ponto: 0, estado: "hidden" },
//     ]

// },
// {
//     q: "Quanto tempo você gasta no banho diariamente?",
//     a: [{ text: "de 5 a 15min", ponto: 4, estado: "visible" },
//         { text: "de 16 a 25min", ponto: 3, estado: "visible"  },
//         { text: "acima de 26min", ponto: 1, estado: "visible"  },
//         { text: "", ponto: 0, estado: "hidden" },
//         { text: "", ponto: 0, estado: "hidden" },
//     ]

// },
// {
//     q: "Quantas horas você gasta viajando de avião anualmente?",
//     a: [{ text: "Nunca viajo", ponto: 5, estado: "visible"  },
//         { text: "0 a 4 horas", ponto: 4, estado: "visible"  },
//         { text: "4 a 10 horas", ponto: 3, estado: "visible" },
//         { text: "10 a 25 horas", ponto: 2, estado: "visible" },
//         { text: "Mais de 25 horas", ponto: 0, estado: "visible" },
//     ]

// },
// {
//     q: "Você possui horta na sua casa?",
//     a: [{ text: "Sim", ponto: 4, estado: "visible" },
//         { text: "Não", ponto: 2, estado: "visible"  },
//         { text: "", ponto: 0, estado: "hidden"  },
//         { text: "", ponto: 0, estado: "hidden" },
//         { text: "", ponto: 0, estado: "hidden" },
//     ]
// },
// {
//     q: "Você usa equipamentos que reduzem o consumo de água ou energia?",
//     a: [{ text: "Sim", ponto: 4, estado: "visible" },
//         { text: "Não", ponto: 2, estado: "visible"  },
//         { text: "", ponto: 0, estado: "hidden"  },
//         { text: "", ponto: 0, estado: "hidden" },
//         { text: "", ponto: 0, estado: "hidden" },
//     ]
// },
// {
//     q: "Você realiza algum tipo de reaproveitamento da água?",
//     a: [{ text: "Sim", ponto: 4, estado: "visible" },
//         { text: "Não", ponto: 2, estado: "visible"  },
//         { text: "", ponto: 0, estado: "hidden"  },
//         { text: "", ponto: 0, estado: "hidden" },
//         { text: "", ponto: 0, estado: "hidden" },
//     ]
// }
]

/* configurando a resposta de todas as seções, a lista não pode ficar vazia. */
Questions.forEach(() => { 
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
    for (let i = 0; i < Questions.length; i++){
        somatorioLista += lista_respostas[i];
        questoes_juntas += (questoes_selecionadas[i].slice(-1));
    }

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
    // Pegando o formulario
    const formulario = document.getElementById('form_variaveis');

    // Definindo os valores dos campos antes de enviar
    formulario.resultado_questoes.value = questoes_juntas;
    formulario.resultado_total.value = somatorioLista;
    formulario.resultado_dica.value = dicaurl;
    
    // Enviando o formulário
    formulario.submit();
    // Redirecionando a página
    //location.href="passagemDados.php?total="+somatorioLista+"&dica="+dicaurl+"&questoes="+questoes_juntas;
}

// Função EXCLUSIVA da função finalizar
function verificar_repeticoes(lista_repeticoes){
    return lista_repeticoes.filter(Boolean).length >=2;
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
