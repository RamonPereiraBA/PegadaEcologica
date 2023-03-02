const screenWidth = window.screen.width;
const cssFile = document.createElement('link');
cssFile.rel = 'stylesheet';

// Adicionando o codigo de css
if (screenWidth > 1000){
    cssFile.href = '../css/resultado.css';
}else{
    cssFile.href = '../css/resultado_celular.css';
}
document.head.appendChild(cssFile);
