// const edit_aberto = document.getElementById('modal_exibicao');
const body = document.getElementById('body');
const main = document.getElementById('main_portfolio');

//editAberto.style.visibility = 'hidden';
function abrir_detalhes_obra(editAberto, id) {
    console.log(editAberto.className);    
    const animationOn = 'slideIn_obra 1.2s forwards'; // Using camelCase for CSS property
    const animationOn_main = 'opacityOff 1.2s forwards';
    const edit_closed = !editAberto.style.visibility || editAberto.style.visibility === 'hidden';  // Check for open state

    if (edit_closed) {
        // editAberto.style.width = '1px'; // Set desired width on opening
        editAberto.style.animation = animationOn; // Apply animation for opening
        main.style.animation = animationOn_main;
        body.style.overflowY = 'hidden';
    } else {        
        editAberto.style.visibility = 'hidden';           // Set width to 0 for closing
        editAberto.style.animation = 'none';      // Remove animation on closing
        main.style.animation = 'none';
    }

    if (editAberto.className == 'modal_detalhes_obra'){     
        fav_icon = document.getElementById('fav_modal');                          
    } else if (editAberto.className == 'modal_detalhes_obra_vertical'){
        fav_icon = document.getElementById('fav_modal_vertical');                          
    }
    
    favoritos = [...new Set(favoritos)]; // excluindo duplicatas
    // console.log('favoritos: ', favoritos);

    // console.log(favoritos);                    
    // console.log(id);
    
    if (favoritos.includes(Number(id))) {
        fav_icon.setAttribute('src', '../src/coracao_icon.png');    
    } else {                            
        fav_icon.setAttribute('src', '../src/coracao_off_icon.png');
    }
    //console.log('test');
}


function fechar_detalhes_obra(editAberto) {
    const animationOff = 'slideOff_obra 1.2s forwards'; // Using camelCase for CSS property
    const animationOff_main = 'opacityOn 1.2s forwards'

    const edit_closed = editAberto.style.visibility === 'visible';  // Check for open state

    if (edit_closed) {
        // editAberto.style.width = '1px'; // Set desired width on opening
        editAberto.style.visibility = 'hidden';           // Set width to 0 for closing
        editAberto.style.animation = 'none';        
    } else {        
        editAberto.style.animation = animationOff; // Apply animation for opening
        main.style.animation = animationOff_main;
        body.style.overflowY = 'visible';
    }

}











// // trecho de teste do layout do portfolio dinâmico
// Seleciona o contêiner do Flexbox e transforma seus filhos em um array
// const flexContainer = document.querySelector('.obras_linha');  // Contêiner Flexbox
// const items = Array.from(flexContainer.children);  // Itens dentro do Flexbox

// // Define os limites de itens por linha (máximo permitido)
// const maxHorizontal = 2;  // Máximo de itens horizontais por linha
// const maxVertical = 4;  // Máximo de itens verticais por linha

// // Função para verificar quantos itens existem em uma linha
// function verificarItensPorLinha() {
//     let currentLineItems = [];  // Armazena os itens da linha atual
//     let firstItemTop = items[0].offsetTop;  // Obtém a posição do primeiro item (referência para a linha)
    
    
//     let countHorizontal = 0;  // Contador de itens horizontais na linha atual
//     let countVertical = 0;  // Contador de itens verticais na linha atual

//     // Itera sobre todos os itens no Flexbox
//     items.forEach((item, index) => {
//         // Verifica se o item está na mesma linha que o primeiro item (com base no offsetTop)
//         const isSameLine = item.offsetTop === firstItemTop;

        
//         console.log('id_item: ' , item.id);
        
//         // Se o item mudou de linha ou é o último item, verifica e aplica as restrições
//         // se não for da mesma linha ou se for o útlimo item
        
//         if (!isSameLine || index === items.length - 1) {
//             aplicarLimites(currentLineItems, countHorizontal, countVertical);  // Aplica os limites de quantidade por linha
//             currentLineItems = [];  // Reseta a lista de itens da linha atual
//             countHorizontal = 0;  // Reseta o contador de itens horizontais
//             countVertical = 0;  // Reseta o contador de itens verticais
//             firstItemTop = item.offsetTop;  // Atualiza a referência para a nova linha
//         }

//         // Adiciona o item atual à lista de itens da linha
//         currentLineItems.push(item);

        
//         // Conta os itens de acordo com a sua classe
//         if (item.classList.contains('obra_horizontal')) countHorizontal++;  // Se o item for horizontal, incrementa o contador de horizontais
//         if (item.classList.contains('obra_vertical')) countVertical++;  // Se o item for vertical, incrementa o contador de verticais
//     });
//     aplicarLimites(currentLineItems, countHorizontal, countVertical)

// }

// // Função para aplicar os limites e verificar se a quantidade de itens por linha excede o máximo permitido
// function aplicarLimites(lineItems, countHorizontal, countVertical) {
//     // Exibe o número de itens na linha atual
//     console.log(`Itens na linha: ${lineItems.length}`);
//     console.log(`Horizontais: ${countHorizontal}, Verticais: ${countVertical}`);
    

//     // lineItems.forEach(item =>{
//     //     console.log('id_item: ' , item.id);
//     // })

//     // Verifica se o número de itens horizontais excedeu o limite
//     if (countHorizontal > maxHorizontal) {
//         console.warn("Excedeu o limite de itens horizontais.");  // Exibe um aviso se exceder o limite
//     }
    
//     // Verifica se o número de itens verticais excedeu o limite
//     if (countVertical > maxVertical) {
//         console.warn("Excedeu o limite de itens verticais.");  // Exibe um aviso se exceder o limite
//     }

//     // Aqui você pode adicionar lógica adicional para manipular os itens conforme as regras de limite
// }

// // Chama a função para verificar e aplicar as regras de layout
