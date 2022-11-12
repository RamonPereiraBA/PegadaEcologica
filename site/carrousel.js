var pagina_atual = 0;
// variavel lista com os membros da equipe
cards = [{
  imagem_card: "Imagens/PEA.jpg",
  nome_organizacao_card: "Programa Educação Ambiental",
  funcionalidade_card: "Colaboradores",
  texto_equipe_card: "Temos o objetivo de promover a educação ambiental junto à população. Visando o conhecimento ecológico necessário para a proteção e preservação ambiental.",
  },
  {
  imagem_card: "imagens/Logo fundacao.png",
  nome_organizacao_card: "Fundação CSN",
  funcionalidade_card: "Cordenadores",
  texto_equipe_card: "Somos responsáveis pelas ações sociais do Grupo CSN e estamos presentes nas principais cidades em que a empresa atua. Os pilares que sustentam a nossa atuação são educação, cultura, articulação e curadoria.",
  },
  {
  imagem_card: "Imagens/images.png",
  nome_organizacao_card: "INPE",
  funcionalidade_card: "Créditos",
  texto_equipe_card: "",
  },
  {
  imagem_card: "imagens/etpc.png",
  nome_organizacao_card: "Escola Técnica Pandiá Calógeras",
  funcionalidade_card: "Desenvolvedores",
  texto_equipe_card: "Fundada em 1944 visando oferecer ensino técnico aos primeiros empregados da Companhia Siderúrgica Nacional e aos seus filhos, é referência nacional em educação para o trabalho, pela excelência de seu processo ensino-aprendizagem, atualização tecnológica e investimento social.",
  }
]

function passar_pagina(){
  // Pegando os elementos do HTML
  var imagem = document.getElementById("imagem");
  var nome_organizacao = document.getElementById('nome_organização');
  var funcionalidade = document.getElementById('funcionalidade');
  var texto_equipe =  document.getElementById('texto_equipe');
  // Passando a página
  pagina_atual++;
  if (pagina_atual >= cards.length){
    pagina_atual = 0;
  }
  //Setando as configurações
  imagem.setAttribute('src', cards[pagina_atual].imagem_card);
  nome_organizacao.innerText = cards[pagina_atual].nome_organizacao_card;
  funcionalidade.innerText = cards[pagina_atual].funcionalidade_card;
  texto_equipe.innerText = cards[pagina_atual].texto_equipe_card;
}
