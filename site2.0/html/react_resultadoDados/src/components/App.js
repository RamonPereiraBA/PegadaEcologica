import React, { useEffect, useState }  from 'react';
import axios from 'axios';

var lista_gambiarra = [0, 0, 0, 0, 0]

var lista_perguntas_e_alternativas = [
  {
      "q": "Com que frequência você come carne vermelha?",
      1: "Nunca",
      2: "três porções por semana",
      3: "uma porção por dia",
      4: "Frequentemente",
      5: "Sempre"
  },
  {
      "q": "Com que frequência você come peixe ou frutos do mar?",
      1: "Nunca",
      2: "Raramente",
      3: "Ocasionalmente",
      4: "Frequentemente",
      5: ""
  },
  {
      "q": "Você usa ar condicionado ou aquecedor na sua casa?",
      1: "sim",
      2: "não",
      3: "",
      4: "",
      5: ""
  },
  {
      "q": "Qual a procedência dos alimentos que você consome?",
      1: "De minha própria horta",
      2: "A maior parte de feiras",
      3: "Normalmente em supermercados",
      4: "Sempre de supermercados",
      5: ""
  },
  {
      "q": "Quantas vezes por ano você compra roupas novas?",
      1: "Nunca",
      2: "Uma vez por ano",
      3: "Duas vezes por ano",
      4: "Três vezes por ano",
      5: "Uma vez por mês ou mais"
  },
  {
      "q": "Com que frequência você compra equipamentos eletrônicos?",
      1: "somente quando quebram e precisam ser substituídos",
      2: "ocasionalmente troco por versões mais modernas",
      3: "troco sempre por aparelhos mais modernos",
      4: "",
      5: ""
  },
  {
      "q": "Com que frequência você compra livros e jornais?",
      1: "Leio notícias pela internet ou compro livros impressos em papel reciclado",
      2: "Tenho assinatura mensal de um jornal e geralmente compro algum livro",
      3: "Compro livros ocasionalmente",
      4: "Compro livros com frequência",
      5: ""
  },
  {
      "q": "Como você descarta o lixo da sua casa?",
      1: "Materiais eletrônicos encaminhados a postos de recolhimento",
      2: "Em duas lixeiras",
      3: "Em uma única lixeira",
      4: "Não me preocupo em separar",
      5: ""
  },
  {
      "q": "Usa lâmpadas econômicas?",
      1: "Todas as lâmpadas que uso são econômicas",
      2: "Metade das lâmpadas que uso são econômicas",
      3: "1/4 das lâmpadas são econômicas",
      4: "Não",
      5: ""
  },
  {
      "q": "Que meio de transporte você mais usa?",
      1: "Bicicleta ou a pé",
      2: "Transporte público",
      3: "Carro, mas procuro andar a pé ou de bicicleta",
      4: "Carro",
      5: ""
  },
  {
      "q": "Com que frequência você bebe refrigerante?",
      1: "Nunca",
      2: "Raramente",
      3: "Ocasionalmente",
      4: "Frequentemente",
      5: ""
  },
  {
      "q": "Quanto tempo você gasta no banho diariamente?",
      1: "de 5 a 15min",
      2: "de 16 a 25min",
      3: "acima de 26min",
      4: "",
      5: ""
  },
  {
      "q": "Quantas horas você gasta viajando de avião anualmente?",
      1: "Nunca viajo",
      2: "0 a 4 horas",
      3: "4 a 10 horas",
      4: "10 a 25 horas",
      5: "Mais de 25 horas"
  },
  {
      "q": "Você possui horta na sua casa?",
      1: "Sim",
      2: "Não",
      3: "",
      4: "",
      5: ""
  },
  {
      "q": "Você adota equipamentos que reduzem o consumo de energia em sua residência?",
      1: "Sim",
      2: "Não",
      3: "",
      4: "",
      5: ""
  },
  {
      "q": "Você realiza algum tipo de reaproveitamento da água?",
      1: "Sim",
      2: "Não",
      3: "",
      4: "",
      5: ""
  }
];

var resultado_media = "0"
var resultado_lista_arrays = []

function App(){
  const [texto_json, setTexto_json] = useState("");
  const [carregou, setCarregou] = useState(false);
  
  useEffect(() => {
    const fetchTextData = async () => {
      try {
        const response = await fetch('http://localhost/site/pegadaecologica/site2.0/html/resultadoDados.php');
        const data = await response.text();
        setTexto_json(data);
      } catch (error) {
        console.error('Erro ao carregar o texto:', error);
      }
    };
  
    fetchTextData();
  }, []);
  
  useEffect(() => {
    if (texto_json) {
      const inicio_media = texto_json.indexOf("media") + 7;
      const fim_media = texto_json.indexOf(",", inicio_media);
      resultado_media = texto_json.substring(inicio_media, fim_media);
  
      // Pegando a lista de arrays
      const inicio_lista_arrays = texto_json.indexOf("lista_medias") + 14;
      const fim_lista_arrays = texto_json.indexOf("}", inicio_lista_arrays);
      resultado_lista_arrays = JSON.parse(texto_json.substring(inicio_lista_arrays, fim_lista_arrays));
      setCarregou(true);
    }
  }, [texto_json]);

  function Barra_porcentagem(props){
    return(
      <>
        <br></br>
        <br></br>
        <div className="barra">
          <div className="barra_porcentagem"></div>
          <div className="barra_texto" style={{width : parseInt((parseInt(props.porcentagem)*70)/100)+"%"}}></div>
          <div className="texto_barra">{props.porcentagem}% marcaram {props.alternativa}</div>
        </div>
      </>
    )
  }

  return (
    <>
    <h1>Média Global</h1>
    <p>A partir daqui, você verá a média geral correspondente a todas as pessoas que fizeram o quiz.<br></br><br></br> As perguntas possuem a porcentagem dos indivíduos que fizeram a pesquisa.</p> 
      {carregou ?(
        <>          
          {lista_perguntas_e_alternativas.map((questao, index_questao) => (
            <>
            <div className="questao">
              <p>{questao['q']}</p>
              {lista_gambiarra.map((alternativa, index_alternativa) => (
                <>
                {lista_perguntas_e_alternativas[index_questao][index_alternativa+1] !== "" &&(
                  <>
                    <Barra_porcentagem
                      porcentagem={resultado_lista_arrays[index_questao][index_alternativa]} 
                      alternativa={lista_perguntas_e_alternativas[index_questao][index_alternativa+1]}
                    />
                  </>
                )}
                </>
              ))}
            </div>
            </>
          ))}
        </>
      ):(
        <>
        <p>Carregando...</p>
        </>
      )}
    </>
    )

}

export default App;