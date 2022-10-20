// o elemento "dica" é o botão
const button = document.getElementById('dica');

// o elemento comentario é a label
const comentario = document.getElementById('textoResposta');
const dica = `<?php include('Contagem.php'); echo $dica; ?>`;

                // se o botão for clicado, altere a label do comentario
button.addEventListener('click', function handleClick() {
    comentario.innerHTML = dica;
});