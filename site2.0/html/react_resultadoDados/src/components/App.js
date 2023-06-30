import React from 'react';
import { useEffect, useState } from 'react';

class Manipular_dados_json {
  constructor(funcao_pos_carregamento) {
    this.texto_json = "aaa",
    // Função que será carregada após o json ser carregado
    this.funcao_pos_carregamento = funcao_pos_carregamento;
    //
    this.resultado_media = "";
    this.resultado_lista_arrays = "";
  }

  setJson_texto = (novoValor) => {
    this.texto_json = novoValor;
    this.funcao_pos_carregamento();
  };

  fetchTextData = async () => {
    try {
      const response = await fetch('http://localhost/site/pegadaecologica/site2.0/html/resultadoDados.php');
      const data = await response.text();
      this.setJson_texto(data);
    } catch (error) {
      console.error('Erro ao carregar o texto:', error);
    }
  };

  transformar_array(){
    // Pegando o média
    const inicio_media = this.texto_json.indexOf("media") + 7;
    const fim_media = this.texto_json.indexOf(",", inicio_media);
    this.resultado_media = this.texto_json.substring(inicio_media, fim_media);

    // Pegando a lista de arrays
    const inicio_lista_arrays = this.texto_json.indexOf("lista_medias") + 14;
    const fim_lista_arrays = this.texto_json.indexOf("}", inicio_lista_arrays);
    this.resultado_lista_arrays = JSON.parse(this.texto_json.substring(inicio_lista_arrays, fim_lista_arrays));
  };
}

function App(){
  const [carregou, setCarregou] = useState(false);

  function funcao_pegar_dados(){
    classes_dados_json.transformar_array();
    setCarregou(true);
  }

  const classes_dados_json = new Manipular_dados_json(funcao_pegar_dados);
  classes_dados_json.fetchTextData();

  return (
    <>
      {carregou ?(
        <>
          <h1>Média Global</h1>
          <p>A partir daqui, você verá a média geral correspondente a todas as pessoas que fizeram o quiz.<br></br><br></br> As perguntas possuem a porcentagem dos indivíduos que fizeram a pesquisa.</p> 
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