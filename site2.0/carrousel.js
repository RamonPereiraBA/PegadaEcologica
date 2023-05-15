var pagina_atual = -1;
var lista_circulos = [document.getElementById('c1'), document.getElementById('c2'), document.getElementById('c3'),
document.getElementById('c4')]

// variavel lista com os membros da equipe
const cards = [{
  imagem_card: "../Imagens/logos/Logo fundacao.png",
  nome_organizacao_card: "Fundação CSN",
  funcionalidade_card: "Cordenadores",
  texto_equipe_card: "Somos responsáveis pelas ações sociais do Grupo CSN e estamos presentes nas principais cidades em que a empresa atua. Os pilares que sustentam a nossa atuação são educação, cultura, articulação e curadoria.",
  redes: ["https://www.instagram.com/grupocsn/", "https://www.csn.com.br/", "https://www.linkedin.com/company/consolidatedsalesnetwork/about/", "https://www.facebook.com/CompanhiaSiderurgicaNacional/?locale=pt_BR"],  
  },
  {
  imagem_card: "../Imagens/logos/PEA.jpg",
  nome_organizacao_card: "Programa Educação Ambiental",
  funcionalidade_card: "Colaboradores",
  texto_equipe_card: "Temos o objetivo de promover a educação ambiental junto à população. Visando o conhecimento ecológico necessário para a proteção e preservação ambiental.",  
  redes: ["", "https://fundacaocsn.org.br/pea/", "", ""],    
  },
  { 
  imagem_card: "../Imagens/logos/etpc.png",
  nome_organizacao_card: "Escola Técnica Pandiá Calógeras",
  funcionalidade_card: "Desenvolvedores",
  texto_equipe_card: "Fundada em 1944 visando oferecer ensino técnico aos primeiros empregados da Companhia Siderúrgica Nacional, é referência nacional em educação para o trabalho, atualização tecnológica e investimento social.",
  redes: ["https://www.instagram.com/etpcvr/", "https://etpc.com.br/", "https://www.linkedin.com/school/escola-tecnica-pandia-calogeras/", "https://www.facebook.com/ETPCVR/?locale=pt_BR"],
  }
]

var posicao_left = 35;
// ajeitando a posição dos circulos
for (let x = 0; x < cards.length; x++){
  // configurando a posição dos circulos
  posicao_left += 5;
  lista_circulos[x].style.left = posicao_left + "%";
  lista_circulos[x].addEventListener('click', () => click_circulo(x))
}

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
  imagem.setAttribute('src', cards[pagina_atual].imagem_card);
  texto_equipe.innerText = cards[pagina_atual].texto_equipe_card;

  // configurando os circulos
  for (let x = 0; x < cards.length; x++){
    // mudando a cor dos circulos
    if (x===pagina_atual){
      lista_circulos[x].style.backgroundColor = "#ebebeb"
    }
    else{
      lista_circulos[x].style.backgroundColor = "#000000"
    }
  }

  setar_redes();

  //Configurando a animação 
  texto_equipe.classList.add('my-div-animate');
  funcionalidade.classList.add('animacao_funcionalidade');
  setTimeout(() => {texto_equipe.classList.remove('my-div-animate');}, 700);
  setTimeout(() => {funcionalidade.classList.remove('animacao_funcionalidade');}, 700);
}


function setar_redes(){
  //pegando todos os links
  for (let i = 0; i < cards[pagina_atual].redes.length; i++){
    // Se tiver a rede social adciona-la 
    if (!cards[pagina_atual].redes[i]==""){
      // se tiver link colocar na tela o simbolo e o link
      get_redes()[i].style.display = "block";
      get_redes()[i].href = cards[pagina_atual].redes[i];
    }
    else{
      // se não remover da tela
      get_redes()[i].style.display = "none";
    }
  }
}

// função para pegar as divs com os simbolos
function get_redes(){
  lista_redes = [document.getElementById("instagram"), document.getElementById("site"), 
                document.getElementById("linkedin"), document.getElementById("facebook"),];
   return lista_redes;
}

// função de quando for clicado em um dos círculos
function click_circulo(lugar){
  pagina_atual = lugar
  setar_pagina()
}
