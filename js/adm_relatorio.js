const elemento = document.getElementById('relatorio_obras');

function isOverflowYAtivo(el) {    
    return el.scrollHeight > el.clientHeight;
}

let scroll = isOverflowYAtivo(elemento);

let thead_relatorio = document.getElementById('tabela_relatorio_thead');

if (scroll){
    thead_relatorio.style.marginRight = '1.1vw';
} else {
    thead_relatorio.style.marginRight = '0px';
}