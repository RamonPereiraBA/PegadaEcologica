import React, { useEffect, useState, useRef }  from 'react';

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

function App(){
  function Input_data(props){
    // Por enquanto usado apenas para atualizar a tela
    const [data_input, setData_input] = useState("")

    const manipular_data = (e) => {
      e.preventDefault();
      const valor_numerico = e.target.value.replace(/\D/g, ''); // Remove tudo que não for número
      // Vendo se o valor está correto para a pesquisa
      props.set_pesquisar(valor_numerico.length === 8);
      // Verifica se pode colocar o hífen, e se pode, onde pode
      if (valor_numerico.length > 2 && valor_numerico.length <= 4){
        const data_correta = `${valor_numerico.slice(0, 2)}-${valor_numerico.slice(2)}`;
        props.data.current = data_correta; 
        setData_input(data_correta);
        return;
      }else if (valor_numerico.length > 4){
        const data_correta = `${valor_numerico.slice(0, 2)}-${valor_numerico.slice(2, 4)}-${valor_numerico.slice(4)}`;
        props.data.current = data_correta; 
        setData_input(data_correta);
        return;
      }
      // Se não tem hífen, retorne o valor númerico apenas
      props.data.current = valor_numerico; 
      setData_input(valor_numerico);
    };

    return(
      <>
        <label htmlFor="input_data">{props.texto}: </label>
        <input
          type="text"
          value={props.data.current}
          id="input_data"
          onChange={manipular_data}
          maxLength={10}
        />
      </>
    )
  }

  //----------------------------------------------------------------------
  // const opcoes_data = [
  //   {value: 'todos_ate_agora', text: 'Todos até Agora'},
  //   {value: 'data_especifica', text: 'Data Específica'}
  // ];

  // const [selected, setSelected] = useState(opcoes_data[0].value);

  //    setSelected(event.target.value);

  // Declaração de variaveis
  const [texto_json, setTexto_json] = useState("");
  const [carregou, setCarregou] = useState(false);
  const [pode_pesquisar, setPode_pesquisar] = useState(false);
  const [pode_pesquisar2, setPode_pesquisar2] = useState(false);
  const resultado_media = useRef(0);
  const resultado_lista_arrays = useRef([]);
  const data = useRef("");
  const data2 = useRef("");

  // Pega a API
  const fetchTextData = async () => {
    const response = await fetch('http://localhost/site/pegadaecologica/site2.0/html/resultadoDados.php');
    const dados = await response.json();
    setCarregou(false);
    setTexto_json(dados);
  };

  // Ao rodar pela primeira vez executa essa função
  useEffect(() => {
    fetchTextData();
  }, []);
  
  // Sempre que a API estiver carregada, ele pega os dados dela
  useEffect(() => {
    if (texto_json) {
      resultado_media.current = texto_json["media"];
      resultado_lista_arrays.current = texto_json["lista_medias"];
      setCarregou(true);
    }
  }, [texto_json]);

  // Fazendo pesquisa com data
  const enviar_data = () => {
    // juntando a data
    const data_para_API = `${data.current.slice(6, 10)}-${data.current.slice(3, 5)}-${data.current.slice(0, 2)}`;
    const data_para_API2 = `${data2.current.slice(6, 10)}-${data2.current.slice(3, 5)}-${data2.current.slice(0, 2)}`;

    const pesquisar_dados = async () => {
      const response = await fetch(`http://localhost/site/pegadaecologica/site2.0/html/resultadoDados.php?data=${data_para_API}&data2=${data_para_API2}`);
      const dados = await response.json();
      setCarregou(false);
      setTexto_json(dados);
    };
    pesquisar_dados();
  };

  function Barra_porcentagem(props){
    return(
      <>
        <div className="alternativa">
          <div className="preenchimento-porcentagem" style={{width : (parseInt(props.porcentagem))+"%"}}></div>
          <div className="resposta">{props.alternativa}</div>
          <div className="porcentagem-texto">{props.porcentagem}%</div>
        </div>
      </>
    )
  }

  return (
    <>
      {carregou ?(
        <> 
          <section id="secao-1">
            <p>A <strong>Pegada Ecológica Global</strong> é</p>
            {resultado_media.current >= 50 ? <h1>Excelente 🔥</h1> : resultado_media.current >= 35 ? <h1>Moderada 🤷</h1> : <h1>Péssima 💔</h1>}
            <p>A <strong>média geral</strong> é de</p>
            <p><span>{resultado_media.current}</span> pontos!!!</p>
          </section>

          <section id="secao-2">
            <p>Esta página tem o intuito de exibir a <strong>Pegada Ecológica Global</strong> e <strong>média geral</strong> de todos os indivíduos que responderam a pesquisa 🌳<br></br><br></br> Esses dados são anônimos e todas as pessoas que responderam a pesquisa terão influência no resultado 🔐</p>
            <p>Você pode visualizar os dados dentro de uma <i>data específica</i> ou em <i>todos os tempos</i>. Basta selecionar na ferramenta de filtro abaixo 👀</p>            
            {/* <a href="../../index.html">Voltar ao início</a>
            <a href="../../resultado.html">Voltar a tela de resultado</a> */}
          </section>

          <hr></hr>
          <section id="secao-3">
          {/* <p className="texto_filtrar">
                Filtrar Por:  
              </p>
              <Input_data data={data} texto="Data inicial" set_pesquisar={setPode_pesquisar}/>
              <Input_data data={data2} texto="Data final" set_pesquisar={setPode_pesquisar2}/>
              <button onClick={enviar_data} disabled={!pode_pesquisar || !pode_pesquisar2}>Pesquisar</button>
              <button onClick={fetchTextData}>Resetar</button> */}
            <div id="filtro">
              <label htmlFor="opcao-data">Filtrando por:</label>
              <select name="opcao-data" id="opcao-data" value={selected} onChange={mudarOpcaoData}>
                {opcoes_data.map(option => (
                  <option key={option.value} value={option.value}>{option.text}</option>
                ))}
              </select>
              <div id="campo-inserir-data">            
                <input
                  type="text"
                  inputmode="numeric"
                  placeholder='Ponha um Dia Específico'
                  value={data}
                  id="input_data"
                  onChange={manipular_data}
                  maxLength={10}
                />
                <button id="btVisualizar" onClick={enviar_data}>Visualizar</button>
              </div>
            </div>
            {lista_perguntas_e_alternativas.map((questao, index_questao) => (
              <>
                <div className="box-questao">
                <div className="box-pergunta">
                <div className="numero-questao">{index_questao + 1}</div>
                <div className="pergunta">{questao['q']}</div>
                </div>
                  {Array(5).fill(0).map((alternativa, index_alternativa) => (
                    <>
                    {lista_perguntas_e_alternativas[index_questao][index_alternativa+1] !== "" &&(
                      <Barra_porcentagem
                        porcentagem={resultado_lista_arrays.current[index_questao][index_alternativa]} 
                        alternativa={lista_perguntas_e_alternativas[index_questao][index_alternativa+1]}
                      />
                    )}
                    </>
                  ))}
                </div>
                </>
            ))}
          <p>*Devido ao arredondamento dos números, as porcentagens podem não somar exatamente 100%*</p>
          </section>
          <footer>
            <div id="campo-redes">
              <h3>Siga nossas Redes 🔥</h3>
              <div id="campo-redes-icones">
                  <a class="nav-link" href="https://www.instagram.com/greenlight.dev/"><i class="bi bi-instagram"></i></a>
                  <a class="nav-link" href="https://github.com/XaropinhoS20/PegadaEcologica"><i class="bi bi-github"></i></a>
                  <a class="nav-link" href="https://www.linkedin.com/in/greenlight-pegada-ecol%C3%B3gica-925bb2273/"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
            
            <div id="campo-outros">
              <a href='#'>Sobre Nós</a>
              <a href='#'>Equipe</a>
              <a href='#'>Dados Globais</a>
            </div>
          </footer>
        </>
      ):(
        <p></p>
      )}
    </>
  )
}

export default App;
