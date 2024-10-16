// const menu = document.getElementById('guest_menu');
// const menu_aberto = document.getElementById('guest_menu_aberto');

// menu.addEventListener("click", animacao_menu);

// const animacao_on = 'slideIn 1.2s forwards';

// document.write(menu_aberto.style.width);

// function animacao_menu(){
//     document.write(menu_aberto.style.width);
//     if (menu_aberto.style.width === 0){
//         menu_aberto.setAttribute(animation, animacao_on);
//     }
// }

const menuAberto = document.getElementById('guest_menu_aberto');

menuAberto.style.width = '0px';

function abrirMenu() {
    const animationOn = 'slideIn 1.2s forwards'; // Using camelCase for CSS property

    const isMenuClosed = menuAberto.style.width === '0px';  // Check for open state
    if (isMenuClosed) {
        menuAberto.style.width = '1px'; // Set desired width on opening
        menuAberto.style.animation = animationOn; // Apply animation for opening
    } else {        
        menuAberto.style.width = '0px';           // Set width to 0 for closing
        menuAberto.style.animation = 'none';      // Remove animation on closing
    }
    console.log('test');
}

function fecharMenu(){
    const animationOff = 'slideOff 1.2s forwards';

    const isMenuOpen = menuAberto.style.width === '1px';
    if (isMenuOpen){
        menuAberto.style.width = '0px';
        menuAberto.style.animation = animationOff;
    } else {
        menuAberto.style.width = '1px';
        menuAberto.style.animation = 'none';
    }
}