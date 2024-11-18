<?php
    include('conexao.php');

    $todas_obras = $mysqli->query('select * from obra');
    $obra = '';
?>


<!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/reset.css" type="text/css">
        <link rel="stylesheet" href="../css/estilo_base.css" type="text/css">
        <link rel="stylesheet" href="../css/estilo_adm_obra.css" type="text/css">
    <title> Obras </title>
    </head>
    <body id="body">
        <main id="main_adm_obra">
            <div class="adm_obras_titulo_secao_obra">
                <h2>
                    Obras ativas
                </h2>
            </div>
            <div class="adm_obras_linha_obras" id="adm_obras_linha_obras_ativas">
                <?php
                    while ($obra = $todas_obras->fetch_assoc()){
                        if ($obra['status'] != '0'){
                ?>
                <div class="adm_obras_obra" id="adm_obras_obra_id_<?php echo $obra['id_obra'] ?>">
                    <div class="adm_obras_obra_info_inicial">
                        <img src="<?php echo $obra['imagem']?>" >
                        <p>
                            Visualizações: <?php echo $obra['visualizacoes']?> <br>
                            Favoritos: <?php echo $obra['favoritos']?>
                        </p>
                    </div>
                    <div class="adm_obras_obra_descricao_inicial">
                        <div class="descricao_obra">
                            <div class="titulos">
                                <h2 class="nome_obra_card" id="titulo_obra_<?php echo $obra['id_obra'] ?>">
                                    <?php echo $obra['titulo']?>
                                </h2>
                                <h2 class="tipo_obra_card" id="tipo_obra_<?php echo $obra['id_obra'] ?>">
                                    <?php echo $obra['tipo']?>
                                </h2>
                            </div>                            
                            <div class='texto' id="descricao_obra_<?php echo $obra['id_obra'] ?>">
                                Descrição: <b> <?php echo $obra['descricao']?> </b>
                            </div>                            
                        </div>
                        <div class="editar_btn" onclick="abrir_edicao_obra()" data_id='<?php echo $obra['id_obra'] ?>'>
                            <img src="../src/edit_icon.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="inputs_inativados" id="posicao_obra_<?php echo $obra['id_obra']?>">
                    <?php echo $obra['posicao'] ?>
                </div>
                <div class="inputs_inativados" id="status_obra_<?php echo $obra['id_obra'] ?>">
                    <?php echo $obra['status'] ?>
                </div>
                <div class="inputs_inativados" id="imagem_obra_<?php echo $obra['id_obra'] ?>">
                    <?php echo $obra['imagem'] ?>
                </div>
                <?php                  
                    }
                }
                ?>                
            </div>  
            <div class="adm_obras_titulo_secao_obra2">
                <h2>
                    Obras desativadas
                </h2>
            </div>
            <div class="adm_obras_linha_obras" id="adm_obras_linha_obras_inativas">
                <?php
                    $obras = $mysqli->query("SELECT * FROM obra");
                    while ($obra = $obras->fetch_assoc()){
                        if ($obra['status'] == '0'){
                ?>
                <div class="adm_obras_obra" id="adm_obras_obra_id_<?php echo $obra['id_obra']?>">
                    <div class="adm_obras_obra_info_inicial">
                        <img src="<?php echo $obra['imagem'] ?>">
                        <p>
                            Visualizações: <?php echo $obra['visualizacoes']?> <br>
                            Favoritos: <?php echo $obra['favoritos']?>
                        </p>
                    </div>
                    <div class="adm_obras_obra_descricao_inicial">
                        <div class="descricao_obra">
                            <div class="titulos">
                                <h2 class="nome_obra_card" id="titulo_obra_<?php echo $obra['id_obra'] ?>">
                                    <?php echo $obra['titulo']?>
                                </h2>
                                <h2 class="tipo_obra_card" id="tipo_obra_<?php echo $obra['id_obra'] ?>">
                                    <?php echo $obra['tipo']?>
                                </h2>
                            </div>                            
                            <div class='texto' id="descricao_obra_<?php echo $obra['id_obra'] ?>">
                                Descrição: <b> <?php echo $obra['descricao']?> </b>
                            </div>
                        </div>
                        <div class="editar_btn" onclick="abrir_edicao_obra()" data_id='<?php echo $obra['id_obra'] ?>'>
                            <img src="../src/edit_icon.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="inputs_inativados" id="posicao_obra_<?php echo $obra['id_obra']?>">
                    <?php echo $obra['posicao'] ?>
                </div>
                <div class="inputs_inativados" id="status_obra_<?php echo $obra['id_obra'] ?>">
                    <?php echo $obra['status'] ?>
                </div>
                <div class="inputs_inativados" id="imagem_obra_<?php echo $obra['id_obra'] ?>">
                    <?php echo $obra['imagem'] ?>
                </div>
                <?php                  
                    }
                }
                ?>                
            </div> 
            <div class="adm_obras_adicionar_obra">
                <div class="adicionar_obra" onclick="abrir_add_obra()">
                    Adicionar Obra
                </div>
            </div>
        </main>
        <script>
            document.querySelectorAll('.editar_btn').forEach(button => {
                // Ao clicar no botão de editar
                button.addEventListener('click', function() {
                    // Pegamos o ID desse botão
        
                    const obraId = this.getAttribute('data_id');
                    let statusObra = document.querySelector(`#status_obra_${obraId}`).textContent.trim();
                    //document.write(statusObra);
                    if (statusObra === '0'){                        
                        document.getElementById('inativar_obra').style.display = 'none';
                        document.getElementById('reativar_obra').style.display = 'flex';
                    } else {
                        document.getElementById('inativar_obra').style.display = 'flex';
                        document.getElementById('reativar_obra').style.display = 'none';
                    }
                })
            })
        </script>
        <form class="main_adm_obra_edit" id="obra_edit" action="./verificar_edit_obra.php" method="POST" enctype="multipart/form-data">
            <div class="informacoes_edit" id="informacoes_edit">
                <div class="upload_img">
                    <img src="" alt="" id="imagem_obra_edit">                    
                    <img src="../src/upload_icon.png" alt="" class="upload_icon">
                    <input type="file" name="input_edit_img_name" id="input_edit_img">
                </div>                
                <div class="descricao">
                    <div class="informacoes_superior">
                        <div class="titulo">
                            <div class="input_titulo">
                                <label for="titulo_obra"> Titulo </label>
                                <input type="text" value="" name="titulo_obra" id="edit_titulo_obra">    
                            </div>
                            
                            <div class="tipo_obra">
                                <label for="tipo_obra"> Tipo </label>
                                <select name="tipo_obra" id="tipo_obra_edit">
                                    <option selected disabled>
                                        
                                    </option>
                                    <option value="Poster">
                                        Poster
                                    </option>
                                    <option value="Wallpaper">
                                        Wallpaper
                                    </option>
                                    <option value="Postagem">
                                        Postagem
                                    </option>
                                </select>
                            </div>                        
                        </div>
                        <div class="close">
                            <p onclick="fechar_edicao_obra()">
                                X
                            </p>
                        </div>
                    </div>
                    <div class="texto">
                        <label for="descricao_edit"> Descrição </label>
                        <textarea id="desc_obra_edit" class="desc_obra_edit" rows="auto" name="descricao_edit">  </textarea>
                    </div>
                </div>                
            </div>
            <div class="dados">
                <div class="id_e_posicao">
                    <div class="texto">
                        ID: <input type="text" id="id_input" class="id_input" readonly name="id_obra_input">
                    </div>
                    <div class="posicao">
                        <input type="checkbox" id="posicao_check" class="posicao_check" name="posicao_obra" value="horizontal"> 
                        <p>
                            Imagem horizontal
                        </p>
                    </div>
                </div>                
                <div class="inativar" onclick="salvarDados()" id='salvar_obra'>
                    Salvar
                </div>
                <div class="inativar" onclick="desativarObraJs()" id='inativar_obra'>
                    Inativar
                </div>
                <div class="inativar" onclick="reativarObraJs()" id='reativar_obra'>
                    Reativar
                </div>
            </div>
            <input class="inputs_inativados" id="edit_inativar_obra" name="status_obra">
            <input class="inputs_inativados" id="edit_reativar_obra" name="status_obra_reativar">
            <input class="inputs_inativados" id="edit_salvar_dados" name='salvar_dados'>
            <input class="inputs_inativados" id="edit_imagem_obra" name="imagem_obra">
        </form> 

        <!-- form add -->
        <form class="main_adm_obra_adicionar" id="obra_add" action="./verificar_add_obra.php" method="POST" enctype="multipart/form-data">
            <div class="informacoes_edit" id="informacoes_edit">
                <div class="upload_img">
                    <img src="" alt="" id="id">                    
                    <img src="../src/upload_icon.png" alt="" class="upload_icon">
                    <input type="file" name="input_add_img_name" id="input_edit_img" required>
                </div>                
                <div class="descricao">
                    <div class="informacoes_superior">
                        <div class="titulo">
                            <div class="input_titulo">
                                <label for="titulo_obra"> Titulo </label>
                                <input type="text" value="" name="titulo_obra">    
                            </div>
                            
                            <div class="tipo_obra">
                                <label for="tipo_obra"> Tipo </label>
                                <select name="tipo_obra">
                                    <option selected disabled>
                                        
                                    </option>
                                    <option value="Poster">
                                        Poster
                                    </option>
                                    <option value="Wallpaper">
                                        Wallpaper
                                    </option>
                                    <option value="Postagem">
                                        Postagem
                                    </option>
                                </select>
                            </div>                        
                        </div>
                        <div class="close">
                            <p onclick="fechar_add_obra()">
                                X
                            </p>
                        </div>
                    </div>
                    <div class="texto">
                        <label for="descricao_edit"> Descrição </label>
                        <textarea id="desc_obra_edit" class="desc_obra_edit"rows="auto" name="descricao_edit">  </textarea>
                    </div>
                </div>                
            </div>
            <div class="dados">
                <div class="id_e_posicao">                    
                    <div class="posicao">
                        <input type="checkbox" class="posicao_check" name="posicao_obra" value="horizontal"> 
                        <p>
                            Imagem horizontal
                        </p>
                    </div>
                </div>                
                <script src="../js/adm_adicionar_obra.js"></script>
                <div class="inativar" onclick="adicionarObra()" id="adicionar_obra">
                    Adicionar
                </div>
            </div>            
        </form>
        <header>
            <h1>
                Daventi
            </h1>
            <div id="guest_menu" onclick="abrirMenu()">
                <img src="../src/menu_icon.png" width="100%" height="100%" >
            </div>
            <div id="guest_menu_aberto">
                <div id="guest_fechar_menu">
                    <p onclick="fecharMenu()">
                        x
                    </p>
                </div>
                <div class="guest_op_menu">
                    <a href="./adm_obras.php" onclick="fecharMenu()">
                        <h2>
                            Obras
                        </h2>      
                    </a>                      
                </div>
                <div class="guest_op_menu">
                    <a href="./adm_relatorio.php" onclick="fecharMenu()">
                        <h2>
                            relatório
                        </h2>      
                    </a>  
                </div>
                <div class="guest_op_menu">
                    <a href="../guest_landing_page.html" onclick="fecharMenu()">
                        <h2>
                            Sair
                        </h2>      
                    </a>  
                </div>
            </div>
        </header>
        <footer>
            <div class="vazio">

            </div>
            <div class="opcoes">
                <div class="vazio">

                </div>
                <div class="redes">
                    <div class="texto">
                        <h1>
                            Daventi
                        </h1>                           
                    </div>
                </div>
                <div class="navegacao">
                    <ul> <h2> Navegação </h2> </ul>                   
                    <ul>
                        <a href="adm_obras.php">
                            Obras
                        </a>
                    </ul>
                    <ul>
                        <a href="adm_relatorio.php">
                            Relatório
                        </a>    
                    </ul>
                </div>
                <div class="vazio"></div>
            </div>
            <div class="copyright">
                © Um projeto do grupo Daventi 2024
            </div>
        </footer>
        <script src="../js/guest_menu.js"></script>
        <script src="../js/adm_obra.js"></script>
    </body>
    <script>
        window.onload = function(){
            let posicaoObra2 = '';
            let tamanho_obras = [];
            let tamanho_obras_inativas = [];
            let linha_obras_inativas = '';
            let linha_obras_ativas = ''
            let obra_desativada = 0;
            let obra_ativada = 0;
            document.querySelectorAll('.editar_btn').forEach(button => {
                // Ao clicar no botão de editar
                let data_id = button.getAttribute('data_id');

                let statusObra2 = document.querySelector(`#status_obra_${data_id}`).textContent.trim();
                // console.log('status: ', statusObra2);

                // pega a posição
                if (statusObra2 == '1'){
                    obra_ativada = 1;
                    posicaoObra2 = document.querySelector(`#posicao_obra_${data_id}`).textContent.trim();

                    // pega a linha de obras ativas
                    let linha_obras_ativas = document.getElementById('adm_obras_linha_obras_ativas'); 
                    
                    // pega todas as obras ativas
                    //let obras = linha_obras_ativas.querySelectorAll('.adm_obras_obra');

                    if (posicaoObra2 == 'horizontal'){
                        tamanho_obras.push('67vw'); // 64vw
                        document.querySelector(`#adm_obras_obra_id_${data_id}`).className = 'adm_obras_obra_horizontal';
                    } else if (posicaoObra2 == 'vertical'){
                        tamanho_obras.push('43vw'); // 38vw
                        document.querySelector(`#adm_obras_obra_id_${data_id}`).className = 'adm_obras_obra_vertical';
                    }

                    // pega o tamanho de cada obra ativa
                    // obras.forEach(obra => {
                    //     tamanho_obras.push(window.getComputedStyle(obra).getPropertyValue("width"));
                    // });

                    // console.log('pos: ', posicaoObra2, '  status:', statusObra2);

                    // EXIBINDO O TAMANHO
                    // tamanho_obras.forEach(tamanho =>{
                    //     console.log('tamanho: ', tamanho);
                    // })
                    // console.log('tamanho geral: ', tamanho_obras);
                    
                    // console.log('tamanho obras: ', tamanho_obras);
                    // console.log('Qtd: ', qtd_obras);

                    // novo valor pro grid
                    let novo_valor_grid_template = '';

                    // define o novo valor do grid
                    tamanho_obras.forEach(tamanho =>{ // para cada obra em todas as obras
                        tamanho = ' ' + tamanho;
                        novo_valor_grid_template += tamanho;
                    })

                    // console.log('Valor final: ', novo_valor_grid_template);
                    // aplica o novo valor
                    // console.log('grid : ', linha_obras_ativas.style.gridTemplateColumns);    
                    linha_obras_ativas.style.gridTemplateColumns = novo_valor_grid_template;
                    // console.log('nova config :',linha_obras_ativas.style.gridTemplateColumns);
                } else {
                    obra_desativada = 1;
                    posicaoObra2 = document.querySelector(`#posicao_obra_${data_id}`).textContent.trim();

                    // pega a linha de obras ativas
                    let linha_obras_inativas = document.getElementById('adm_obras_linha_obras_inativas'); 
                    
                    // linha_obras_inativas.style.backgroundImage = 'url(../src/cat.jpg);';
                
                    // pega todas as obras ativas
                    //let obras = linha_obras_ativas.querySelectorAll('.adm_obras_obra');

                    if (posicaoObra2 == 'horizontal'){
                        tamanho_obras_inativas.push('67vw'); // 64vw
                        document.querySelector(`#adm_obras_obra_id_${data_id}`).className = 'adm_obras_obra_horizontal';
                    } else if (posicaoObra2 == 'vertical'){
                        tamanho_obras_inativas.push('43vw'); // 38vw
                        document.querySelector(`#adm_obras_obra_id_${data_id}`).className = 'adm_obras_obra_vertical';
                    }

                    // pega o tamanho de cada obra ativa
                    // obras.forEach(obra => {
                    //     tamanho_obras.push(window.getComputedStyle(obra).getPropertyValue("width"));
                    // });

                    // console.log('pos: ', posicaoObra2, '  status:', statusObra2);

                    // EXIBINDO O TAMANHO
                    // tamanho_obras.forEach(tamanho =>{
                    //     console.log('tamanho: ', tamanho);
                    // })
                    // console.log('tamanho geral: ', tamanho_obras);
                    
                    // console.log('tamanho obras: ', tamanho_obras);
                    // console.log('Qtd: ', qtd_obras);

                    // novo valor pro grid
                    let novo_valor_grid_template_inativadas = '';

                    // define o novo valor do grid
                    tamanho_obras_inativas.forEach(tamanho =>{ // para cada obra em todas as obras
                        tamanho = ' ' + tamanho;
                        novo_valor_grid_template_inativadas += tamanho;
                    })

                    // console.log('Valor final: ', novo_valor_grid_template);
                    // aplica o novo valor
                    // console.log('grid : ', linha_obras_ativas.style.gridTemplateColumns);    
                    linha_obras_inativas.style.gridTemplateColumns = novo_valor_grid_template_inativadas;
                    // console.log('nova config :',linha_obras_ativas.style.gridTemplateColumns);            
                }
            })

            // mensagem pro caso de nao ter obras inativadas
            console.log('lenght : ', linha_obras_inativas.lenght);
            if (linha_obras_inativas == ''){
                linha_obras_inativas = document.getElementById('adm_obras_linha_obras_inativas'); 
            }
            if (linha_obras_inativas.lenght == undefined && obra_desativada == 0){                    
                let msg_vazio = document.createElement('div');

                msg_vazio.textContent = "Nenhuma obra desativada";
                msg_vazio.classList.add('adm_obras_desativadas');

                // Insere a nova div no grid-pai
                linha_obras_inativas.appendChild(msg_vazio);
            }


            // mensagem pro caso de nao ter obras ativadas
            if (linha_obras_ativas == ''){
                linha_obras_ativas = document.getElementById('adm_obras_linha_obras_ativas'); 
            }
            if (linha_obras_ativas.lenght == undefined && obra_ativada == 0){                    
                let msg_vazio2 = document.createElement('div');

                msg_vazio2.textContent = "Nenhuma obra ativada";
                msg_vazio2.classList.add('adm_obras_desativadas');

                // Insere a nova div no grid-pai
                linha_obras_ativas.appendChild(msg_vazio2);
            }

            const parametros = new URLSearchParams(window.location.search);
            if (parametros.has('status')){
                console.log('2');
                const status = parametros.get('status');
                
                if (status === 'sucesso'){
                    alert('Alterações salvas com sucesso');
                } else if (status === 'sucesso_inativar'){
                    alert('Obra inativada com sucesso');
                } else if (status === 'erro_enviar_arquivo'){ 
                    alert('Erro ao enviar o arquivo');
                } else if (status === 'erro_extensao'){ 
                    alert('Tipo de arquivo não suportado');
                } else if (status === 'erro_envio'){ 
                    alert('Erro ao enviar o arquivo');
                } else if (status === 'sucesso_envio'){ 
                    alert('Arquivo enviado com sucesso');
                } else if (status === 'sucesso_reativar'){ 
                    alert('Obra reativada com sucesso');
                } else if (status === 'sucesso_add'){ 
                    alert('Obra adicionada com sucesso');
                } else {
                    alert(status);
                }
               
                const newUrl = window.location.origin + window.location.pathname;
                window.history.replaceState({}, document.title, newUrl);
            }
        }

        let scroll_obras = document.getElementById('adm_obras_linha_obras_ativas');
        let scroll_obras_inativas = document.getElementById('adm_obras_linha_obras_inativas');
        // Adiciona um evento para rolar horizontalmente com a roda do mouse
        scroll_obras.addEventListener('wheel', function(event) {
            event.preventDefault();  // Impede a rolagem padrão (vertical)
            
            // Desloca horizontalmente com base no movimento vertical da roda
            scroll_obras.scrollLeft += event.deltaY; 
        });

        scroll_obras_inativas.addEventListener('wheel', function(event) {
            event.preventDefault();  // Impede a rolagem padrão (vertical)
            
            // Desloca horizontalmente com base no movimento vertical da roda
            scroll_obras_inativas.scrollLeft += event.deltaY; 
        });
    </script>
</html>