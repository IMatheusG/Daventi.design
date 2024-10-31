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
    <title> Document </title>
    </head>
    <body id="body">
        <main id="main_adm_obra">
            <div class="adm_obras_titulo_secao_obra">
                <h2>
                    Obras ativas
                </h2>
            </div>
            <div class="adm_obras_linha_obras">
                <?php
                    while ($obra = $todas_obras->fetch_assoc()){
                        if ($obra['status'] != '0'){
                ?>
                <div class="adm_obras_obra">
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
                                Descrição: <b > <?php echo $obra['descricao']?> </b>
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
            <div class="adm_obras_linha_obras">
                <?php
                    $obras = $mysqli->query("SELECT * FROM obra");
                    while ($obra = $obras->fetch_assoc()){
                        if ($obra['status'] == '0'){
                ?>
                <div class="adm_obras_obra">
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
            <div class="informacoes">
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
                        <textarea id="desc_obra_edit" rows="auto" name="descricao_edit">  </textarea>
                    </div>
                </div>                
            </div>
            <div class="dados">
                <div class="id_e_posicao">
                    <div class="texto">
                        ID: <input type="text" id="id_input" readonly name="id_obra_input">
                    </div>
                    <div class="posicao">
                        <input type="checkbox" id="posicao_check" name="posicao_obra" value="horizontal"> 
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

        <!-- <form class="main_adm_obra_adicionar">
            <div class="informacoes">
                <div class="upload_img">
                    <img src="../src/upload_icon.png" alt="">
                </div>                
                <div class="descricao">
                    <div class="titulos">
                        <div class="input_titulo">
                            <label for="titulo_obra"> Titulo </label>
                            <input type="text" value="" name="titulo_obra">    
                        </div>
                        
                        <div class="tipo_obra">
                            <label for="tipo_obra"> Tipo </label>
                            <select name="tipo_obra">
                                <option>
                                    
                                </option>
                                <option value="poster">
                                    Poster
                                </option>
                                <option value="wallpaper">
                                    Wallpaper
                                </option>
                                <option value="postagem">
                                    Postagem
                                </option>
                            </select>
                        </div>                        
                    </div>
                    <div class="texto">
                        <label for="descricao_edit"> Descrição </label>
                        <textarea id="desc_obra_edit" rows="auto" name="descricao_edit">  </textarea>
                    </div>
                </div>
            </div>
            <div class="dados">
                <div class="texto">
                    
                </div>                
                <div class=""></div>
                <div class="salvar">
                    <input type="submit" value="Salvar">
                </div>
            </div>
        </form> -->
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
                    <a href="./adm_clientes.html" onclick="fecharMenu()">
                        <h2>
                            Clientes
                        </h2>      
                    </a>              
                </div>
                <div class="guest_op_menu">
                    <a href="./adm_obras.html" onclick="fecharMenu()">
                        <h2>
                            Obras
                        </h2>      
                    </a>                      
                </div>
                <div class="guest_op_menu">
                    <a href="./adm_relatorio.html" onclick="fecharMenu()">
                        <h2>
                            relatório
                        </h2>      
                    </a>  
                </div>
                <div class="guest_op_menu">
                    <a href="./guest_landing_page.html" onclick="fecharMenu()">
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
                        <a href="user_home.html">
                            Clientes
                        </a>    
                    </ul>
                    <ul>
                        <a href="./user_portfolio.html">
                            Obras
                        </a>
                    </ul>
                    <ul>
                        <a href="./user_perfil.html">
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
            const parametros = new URLSearchParams(window.location.search);
            if (parametros.has('status')){
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
                } else {
                    alert(status);
                }
               
                const newUrl = window.location.origin + window.location.pathname;
                window.history.replaceState({}, document.title, newUrl);
            }
        }
    </script>
</html>