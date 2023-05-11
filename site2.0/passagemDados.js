// pegando as duas opções
const options = document.querySelectorAll('input[name="option"]');
// Pegando cada um das opções e adicionando uma função que checa quando ela é marcada e descobre o valor dela(sim ou não)
options.forEach((option) => {
    option.addEventListener('change', (event) => {
        if (event.target.checked) {
            verificar_radioButtom(event.target.value);
        }
    });
});

// Criando uma função que mostra a parte do email
const formulario = document.getElementById("formulario_email");
function verificar_radioButtom(parametro){
    if (parametro == "sim"){
        formulario.style.display = "block";
    }else{
        formulario.style.display = "none";
    }
}