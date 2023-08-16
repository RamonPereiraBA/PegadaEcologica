const bt_continuar =  document.getElementById("botao");
// Primeiro, obtenha uma referência para o elemento select pelo ID
var containerEl = document.getElementById("ocupacao_id"); // container
var elem = containerEl.getElementsByTagName("option"); // elemento

containerEl.addEventListener("change", function() {
    // O código dentro desta função será executado quando o valor mudar
    var valorSelecionado = containerEl.value; // objetivo: pegar o valor selecionado
    if (valorSelecionado === "nao_escolhido"){
        bt_continuar.style.display = "none";
        return;
    }
    
    bt_continuar.style.display = "block"
});
