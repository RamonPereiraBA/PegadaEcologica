var pagina_atual = -1;

// variavel lista com os membros da equipe
const cards = [{
  imagem_card: "../Imagens/logos/PEA.jpg",
  nome_organizacao_card: "Programa Educação Ambiental",
  funcionalidade_card: "Colaboradores",
  texto_equipe_card: "Temos o objetivo de promover a educação ambiental junto à população. Visando o conhecimento ecológico necessário para a proteção e preservação ambiental.",  
  },
  {
  imagem_card: "../Imagens/logos/Logo fundacao.png",
  nome_organizacao_card: "Fundação CSN",
  funcionalidade_card: "Cordenadores",
  texto_equipe_card: "Somos responsáveis pelas ações sociais do Grupo CSN e estamos presentes nas principais cidades em que a empresa atua. Os pilares que sustentam a nossa atuação são educação, cultura, articulação e curadoria.",
  },
  {
  imagem_card: "../Imagens/logos/inpe-logo.png",
  nome_organizacao_card: "INPE",
  funcionalidade_card: "Créditos",
  texto_equipe_card: "Criada em 1961 com o objetivo de impulsionar o país nas pesquisas cientificas e nas tecnologias espaciais. Suas atividades se ampliaram e a importância dos estudos vão desde assuntos complexos sobre a origem do Universo até as questões de desflorestamento das nossas matas.",
  },
  {
  imagem_card: "../Imagens/logos/etpc.png",
  nome_organizacao_card: "Escola Técnica Pandiá Calógeras",
  funcionalidade_card: "Desenvolvedores",
  texto_equipe_card: "Fundada em 1944 visando oferecer ensino técnico aos primeiros empregados da Companhia Siderúrgica Nacional e aos seus filhos, é referência nacional em educação para o trabalho, pela excelência de seu processo ensino-aprendizagem, atualização tecnológica e investimento social.",
  }
]

passar_pagina("+")

function passar_pagina(direcao){
  if (direcao === "+"){
    pagina_atual++;
    if (pagina_atual >= cards.length){
      pagina_atual = 0;
    }
  }
  else{
    pagina_atual--;
    if (pagina_atual<0){
      pagina_atual = (cards.length-1)
    }
  }
  setar_pagina()
}

function setar_pagina(){
  // componentes do card
  var imagem = document.getElementById("imagem_card");
  var funcionalidade = document.getElementById('funcionalidade');
  var texto_equipe =  document.getElementById('texto_equipe');

  //Colando os textos
  funcionalidade.innerText = cards[pagina_atual].funcionalidade_card;
  texto_equipe.innerText = cards[pagina_atual].texto_equipe_card;
  imagem.setAttribute('src', cards[pagina_atual].imagem_card);

  // configurando os circulos
  var lista_circulos = [document.getElementById('c1'), document.getElementById('c2'), document.getElementById('c3'),
  document.getElementById('c4')]
  var posicao_left = 35;

  for (let x = 0; x < cards.length; x++){
    // configurando a posição dos circulos
    posicao_left += 5;
    lista_circulos[x].style.left = posicao_left + "%";
    // mudando a cor dos circulos
    if (x===pagina_atual){
      lista_circulos[x].style.backgroundColor = "#ebebeb"
    }
    else{
      lista_circulos[x].style.backgroundColor = "#000000"
    }
    lista_circulos[x].addEventListener('click', () => click_circulo(x))
  }
}

// função de quando for clicado em um dos círculos
function click_circulo(lugar){
  pagina_atual = lugar
  setar_pagina()
}
