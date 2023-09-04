const form = document.getElementById("formulario_variaveis");
const form_1 = document.getElementById("form_1_id");
const form_2 = document.getElementById("form_2_id");
const form_3 = document.getElementById("form_3_id");
function confirmar_1(){
    const resposta_form_1 = document.querySelector('input[name="resposta_form_1"]:checked');
    if (resposta_form_1 === null){
        console.log("---")
        return;
    }
    if (resposta_form_1.value === "n"){
        form.submit();
        return;
    }
    form_1.style.display = "none";
    form_2.style.display = "block";
}

function confirmar_2(){
    const resposta_form_2 = document.querySelector('input[name="resposta_form_2"]:checked');
    if (resposta_form_2 === null){
        console.log("---")
        return;
    }
    if (resposta_form_2.value === "n"){
        form.submit();
        return;
    }
    form_2.style.display = "none";
    form_3.style.display = "block";
}

function confirmar_3(){
    const csn_checkbox = document.getElementById("csn");
    if (csn_checkbox.checked){
        form.unidade.value = "";
    }else{
        const departamento_selecionado = document.getElementById("departamentos");
        form.unidade.value = departamento_selecionado.value;
    }
    const bairro_selecionado = document.getElementById("bairro_dropdown_id");
    form.bairro.value = bairro_selecionado.value;
    form.submit();
}