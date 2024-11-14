function enviarEditPerfil(){
    const form = document.getElementById('form_edit_perfil');
    form.submit();
}

const editAberto = document.getElementById('edit_perfil');
const body = document.getElementById('body');
const main = document.getElementById('main_user');

function abrir_modal_editar() {
    const animationOn = 'slideIn_edit_perfil 1.2s forwards';
    const animationOn_main = 'opacityOff 1.2s forwards';
    
    // Verifica se está oculto
    const edit_closed = !editAberto.style.visibility || editAberto.style.visibility === 'hidden';

    if (edit_closed) {
        editAberto.style.visibility = 'visible'; // Exibe a modal
        editAberto.style.animation = animationOn; // Define animação de abertura
        main.style.animation = animationOn_main; // Animação de opacidade no main
        body.style.overflowY = 'hidden'; // Desativa rolagem da página
    } else {        
        editAberto.style.visibility = 'hidden'; // Oculta a modal
        editAberto.style.animation = 'none';    // Remove animação
        main.style.animation = 'none';          // Remove animação do main
    }
}


function fechar_edit_perfil() {
    const animationOff = 'slideOff_edit_perfil 1.2s forwards'; // Using camelCase for CSS property
    const animationOff_main = 'opacityOn 1.2s forwards';

    const edit_closed = editAberto.style.visibility === 'hidden';  // Check for open state

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

function desativar_perfil(){
    let status_user = 0;

    document.getElementById('inativar_perfil').value = status_user;
    let form = document.getElementById('desativar_conta');
    form.submit();

}

//editAberto.style.visibility = 'hidden';
function abrir_detalhes_obra(editAberto, id) {
    // console.log(editAberto.className);    
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
    
    // if (editAberto.className == 'modal_detalhes_obra'){     
    //     fav_icon = document.getElementById('fav_modal');                          
    // } else if (editAberto.className == 'modal_detalhes_obra_vertical'){
    //     fav_icon = document.getElementById('fav_modal_vertical');                          
    // }
    
    // favoritos = [...new Set(favoritos)]; // excluindo duplicatas
    // // console.log('favoritos: ', favoritos);

    // // console.log(favoritos);                    
    // // console.log(id);
    
    // if (favoritos.includes(Number(id))) {
    //     fav_icon.setAttribute('src', '../src/coracao_icon.png');    
    // } else {                            
    //     fav_icon.setAttribute('src', '../src/coracao_off_icon.png');
    // }
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