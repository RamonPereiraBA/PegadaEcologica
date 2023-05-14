// pegando as duas opções
const options = document.querySelectorAll('input[name="option"]');
const btContinuar = document.querySelector("[name='botao']");
// Pegando cada um das opções e adicionando uma função que checa quando ela é marcada e descobre o valor dela(sim ou não)
options.forEach((option) => {
    option.addEventListener('change', (event) => {
        if (event.target.checked) {
            verificar_radioButton(event.target.value);
        }
    });
});

// Criando uma função que mostra a parte do email
const formulario = document.getElementById("formulario_email");
function verificar_radioButton(parametro){
    if (parametro == "sim"){
        formulario.style.display = "block";
    }else{
        formulario.style.display = "none";
    }
    btContinuar.style.display = "block"
}