const editAberto = document.getElementById('obra_edit');
const body = document.getElementById('body');
const main = document.getElementById('main_adm_obra');

//editAberto.style.visibility = 'hidden';
function abrir_edicao_obra() {
    
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

// add's
let addAberto = document.getElementById('obra_add');
function abrir_add_obra() {
    // redefinir edit_closed e edit_aberto
    const animationOn = 'slideIn_obra 1.2s forwards'; // Using camelCase for CSS property
    const animationOn_main = 'opacityOff 1.2s forwards';
    const edit_closed = !addAberto.style.visibility || addAberto.style.visibility === 'hidden';
    
    if (edit_closed) {
        // editAberto.style.width = '1px'; // Set desired width on opening
        addAberto.style.animation = animationOn; // Apply animation for opening
        main.style.animation = animationOn_main;
        body.style.overflowY = 'hidden';
    } else {        
        addAberto.style.visibility = 'hidden';           // Set width to 0 for closing
        addAberto.style.animation = 'none';      // Remove animation on closing
        main.style.animation = 'none';
    }
    //console.log('test');
}

function fechar_add_obra() {
    const animationOff = 'slideOff_obra 1.2s forwards'; // Using camelCase for CSS property
    const animationOff_main = 'opacityOn 1.2s forwards'

    const edit_closed = addAberto.style.visibility === 'visible';  // Check for open state

    if (edit_closed) {
        // editAberto.style.width = '1px'; // Set desired width on opening
        addAberto.style.visibility = 'hidden';           // Set width to 0 for closing
        addAberto.style.animation = 'none';        
    } else {        
        addAberto.style.animation = animationOff; // Apply animation for opening
        main.style.animation = animationOff_main;
        body.style.overflowY = 'visible';
    }

}

// Passando os valores para a modal de edit
// document.write('abc');

// document.getElementById('adm_obras_obra_id_1').className = 'adm_obras_obra';
// document.getElementById('adm_obras_obra_id_2').className = 'adm_obras_obra';
// linha_obras_inativas.setAttribute('background-image', "url(../src/cat.jpg)");
document.querySelectorAll('.editar_btn').forEach(button => {
    button.addEventListener('click', function() {
        // Pegamos o ID desse botão
        
        const obraId = this.getAttribute('data_id');

        // console.log('Obra ID: ', obraId);
        // aqui eu já tenho o ID

        // Pegamos o título e a descrição do card com o ID certo
        const obraTitulo = document.querySelector(`#titulo_obra_${obraId}`).innerHTML.trim();
        let obraDescricao = document.querySelector(`#descricao_obra_${obraId}`).textContent.trim();
        // console.log(obraDescricao);
        obraDescricao = obraDescricao.slice(11);
        obraDescricao = obraDescricao.trim();
        // console.log(obraDescricao);
        const obraTipo = document.querySelector(`#tipo_obra_${obraId}`).textContent.trim();
        const posicaoObra = document.querySelector(`#posicao_obra_${obraId}`).textContent.trim();
        let statusObra = document.querySelector(`#status_obra_${obraId}`).textContent.trim();
        const imagemObra = document.querySelector(`#imagem_obra_${obraId}`).textContent.trim();
        // aqui já tenho o conteúdo da obra        
        
        // Colocamos os dados que coletamos dentro do edit
        document.getElementById('id_input').value = obraId;
        document.getElementById('edit_titulo_obra').value = obraTitulo;
        document.getElementById('tipo_obra_edit').value = obraTipo;
        document.getElementById('desc_obra_edit').textContent = obraDescricao;
        document.getElementById('edit_inativar_obra').value = statusObra;
        document.getElementById('edit_imagem_obra').value = imagemObra;

        
        document.getElementById('imagem_obra_edit').setAttribute('src', imagemObra )
        document.getElementById('imagem_obra_edit').setAttribute('width', '100%' );
        document.getElementById('imagem_obra_edit').setAttribute('height', '100%' );

        

        // console.log('img : ' + imagemObra);
        // console.log(posicaoObra);
        if (posicaoObra == 'horizontal'){
            document.getElementById('posicao_check').checked = true;
        } else {
            document.getElementById('posicao_check').checked = false;
        }

        if (posicaoObra == 'horizontal'){
            document.getElementById('obra_edit').className = 'main_adm_obra_edit_horizontal';
            document.getElementById('informacoes_edit').className = 'informacoes_edit_horizontal';
        } else {
            document.getElementById('obra_edit').className = 'main_adm_obra_edit';
            document.getElementById('informacoes_edit').className = 'informacoes_edit';
        }           
    });
});

function desativarObraJs(){
    statusObra = '0';
    // document.write('status atual: ', statusObra);
    // document.write(obraTitulo);
    document.getElementById('edit_inativar_obra').value = statusObra;

    // manda o form
    const form = document.getElementById('obra_edit');
    form.submit();
}


function reativarObraJs(){
    statusObra = '1';
    // document.write('status atual: ', statusObra);
    // document.write(obraTitulo);
    document.getElementById('edit_reativar_obra').value = statusObra;

    // manda o form
    const form = document.getElementById('obra_edit');
    form.submit();
}

function salvarDados(){
    document.getElementById('edit_salvar_dados').value = 1;
    const form = document.getElementById('obra_edit');
    form.submit();
}
