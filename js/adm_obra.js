const editAberto = document.getElementById('obra_edit');
const body = document.getElementById('body');
const main = document.getElementById('main_adm_obra');
//editAberto.style.visibility = 'hidden';
function abrir_edicao_obra() {
    
    const animationOn = 'slideIn_obra 1.2s forwards'; // Using camelCase for CSS property
    const animationOn_main = 'opacityOff 1.2s forwards';
    const edit_closed = editAberto.style.visibility === 'hidden';  // Check for open state

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
    //console.log('test');
}


function fechar_edicao_obra() {
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

document.querySelectorAll('.editar_btn').forEach(button => {
    // Quando clicamos no botão de editar...
    button.addEventListener('click', function() {
        // Pegamos o número especial do card (ID) desse botão
        const obraId = this.getAttribute('data_id');

        // aqui eu já tenho o ID

        // Pegamos o título e a descrição do card com o ID certo
        const obraTitulo = document.querySelector(`#titulo_obra_${obraId}`).textContent.trim();
        const obraDescricao = document.querySelector(`#descricao_obra_${obraId} b`).textContent.trim();
        const obraTipo = document.querySelector(`#tipo_obra_${obraId}`).textContent.trim();

        // aqui já tenho o conteúdo da obra

        // Colocamos o número do card, o título e a descrição dentro da modal
        document.getElementById('edit_id').textContent = "ID: " + obraId;
        document.getElementById('edit_titulo_obra').value = obraTitulo;
        document.getElementById('tipo_obra_edit').value = obraTipo;
        document.getElementById('desc_obra_edit').textContent = obraDescricao;
        
        
    });
});