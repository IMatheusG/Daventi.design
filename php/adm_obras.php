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
            <div class="adm_obras_linha_obras">
                <?php
                    while ($obra = $todas_obras->fetch_assoc()){
                    
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
                                Descrição: <b> <?php echo $obra['descricao']?> </b>
                            </div>
                        </div>
                        <div class="editar_btn" onclick="abrir_edicao_obra()" data_id='<?php echo $obra['id_obra'] ?>'>
                            <img src="../src/edit_icon.png" alt="">
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>                
            </div>  
        </main>
        <form class="main_adm_obra_edit" id="obra_edit" action="./verificar_edit_obra.php" method="POST">
            <div class="informacoes">
                <div class="upload_img">
                    <img src="../src/upload_icon.png" alt="">
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
                <div class="salvar">
                    <input type="submit" value="Salvar">
                </div>
                <div class="inativar">
                    <p>
                        Inativar
                    </p>
                </div>
            </div>
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
                } else {
                    alert(status);
                }
               
                const newUrl = window.location.origin + window.location.pathname;
                window.history.replaceState({}, document.title, newUrl);
            }
        }
    </script>
</html>