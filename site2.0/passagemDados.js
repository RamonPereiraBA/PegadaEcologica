// const campo_email = document.getElementById("input_email");
// function verificar_radioButton(parametro){
//     if (parametro == "sim"){
//         formulario.style.display = "block";
//     }else{
//         formulario.style.display = "none";
//         campo_email.value = "";
//     }
//     btContinuar.style.display = "block"
// }
// Primeiro, obtenha uma referência para o elemento select pelo ID
console.log("aaa")
var containerEl = document.getElementById("ocupacao_id"); // container
var elem = containerEl.getElementsByTagName("option"); // elemento

containerEl.addEventListener("change", function() {
    // O código dentro desta função será executado quando o valor mudar
    var valorSelecionado = elem; // objetivo: pegar o valor selecionado
    if (valorSelecionado == "nao_escolhido")
    {

    }
    console.log(valorSelecionado)
    
    // Agora você pode fazer algo com o novo valor selecionado
    // btContinuar.style.display = "block"

    console.log("Novo valor selecionado: " + valorSelecionado);
});