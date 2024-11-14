<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Perfil </title>
        <link rel="stylesheet" href="../css/reset.css" type="text/css">
        <link rel="stylesheet" href="../css/estilo_base.css" type="text/css">
        <link rel="stylesheet" href="../css/estilo_user_perfil.css" type="text/css">
    </head>
    <?php 
        include('conexao.php');
        session_start();
        $id_user = $_SESSION['id_user'];
        $sql_select_fav = "SELECT f.user_id_favorito, f.id_favorito, f.obra_id_favorito, f.status, o.id_obra, o.titulo, o.tipo, o.imagem, o.status, o.posicao, o.descricao
        FROM usuario u 
        INNER JOIN favorito f ON u.id_user  = f.user_id_favorito 
        INNER JOIN obra o ON f.obra_id_favorito = o.id_obra
        WHERE f.status = 1 and o.status = 1";
        $resultado_select_fav = $mysqli->query($sql_select_fav);

        $_SESSION['favoritos_user'] = [];
        $favorito_user = $_SESSION['favoritos_user'];
    ?>
    <body id="body">
        <main id="main_user">
            <div class="user_perfil_card">
                <div class="user_perfil_imagem">
                    <img src="<?php echo $_SESSION['imagem_perfil_user']; ?>" alt="">
                </div>
                <div class="user_perfil_descricao">
                    <div class="nome">
                        <?php echo $_SESSION['nome_user']; ?>
                    </div>
                    <div class="email">
                        <?php echo $_SESSION['email_user']; ?>
                    </div>
                </div>                
                <p onclick="abrir_modal_editar()" class="edit_perfil">
                    Editar perfil
                </p>             
                
            </div>
            <div class="secao_favoritos">
                <h2>
                    Obras favoritadas
                </h2>
                <div class="fundo_exibicao_favoritos" id="fundo_exibicao_favoritos">
                    <div class="obras_linha" id="obras_linha">
                        <?php 
                            while ($obra = $resultado_select_fav->fetch_assoc()){

                        ?>
                        <div class="obra" id="obra_<?php echo $obra['id_obra']?>" data_id="<?php echo $obra['id_obra']?>">
                            <img src="<?php echo $obra['imagem'] ?>" alt="">
                        </div> 
                        
                        <div class="inputs_inativados" id="posicao_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['posicao'] ?> </div>

                        <div class="inputs_inativados" id="nome_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['titulo'] ?> </div>

                        <div class="inputs_inativados" id="imagem_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['imagem'] ?> </div>

                        <div class="inputs_inativados" id="descricao_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['descricao'] ?> </div>

                        <div class="inputs_inativados" id="tipo_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['tipo'] ?> </div>

                        <div class="inputs_inativados" id="id_user_<?php echo $obra['id_obra'] ?>"> <?php echo $_SESSION['id_user'] ?> </div>
                        
                        
                        <div class="inputs_inativados" id="obras_fav_<?php echo $obra['id_obra'] ?>"> <?php 
                            foreach($_SESSION['favoritos_user'] as $favorito){
                                echo "'" . $favorito . "'";
                                echo "<script> favoritos.push($favorito); </script>";
                            }
                        ?> </div>

                        <?php 
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div class="user_perfil_opcoes">                
                <form class="user_perfil_desativacao" method="POST" action="./verificar_edit_perfil.php" id="desativar_conta">
                    <p onclick="desativar_perfil()" class="cursor">
                        Desativar conta
                    </p>
                    <input class="inputs_inativados" id="inativar_perfil" name="status_user" value='0'>
                </form>
            </div>
        </main>
        <form action="" class="modal_detalhes_obra_vertical" id="modal_exibicao_vertical">
            <div class="imagem_e_categoria_vertical">
                <img src="../src/obras/ikigai.jpg" alt="" id="modal_imagem_vertical">
                <div class="categoria_e_fav">
                    <div class="p">
                        Categoria: <b id="modal_tipo_vertical">Wallpaper</b>
                    </div>
                    <div class="favorito" onclick="verificarFavorito()">
                        <img src="../src/coracao_off_icon.png" alt=""  id="fav_modal_vertical">
                    </div>
                </div>
            </div>
            <div class="titulo_e_descricao">
                <div class="titulo_e_close_vertical">
                    <h2 id="modal_titulo_vertical">
                        Nome da obra
                    </h2>
                    <div class="close">
                        <p onclick="fechar_detalhes_obra(document.getElementById('modal_exibicao_vertical'))">
                            X
                        </p>                        
                    </div>
                </div>
                                    
                <div class="descricao_obra">
                    Descrição: <b id="modal_descricao_vertical"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum deleniti ab perferendis, nulla, voluptate unde tenetur illum harum quo atque eligendi enim nemo quas, praesentium officiis aspernatur corporis repellendus commodi. </b>                    
                </div>
            </div>
        </form>
        
        <form action="" class="modal_detalhes_obra" id="modal_exibicao">            
            <div class="titulo_e_close" >
                <h2 id="modal_titulo">
                    Nome da obra
                </h2>
                <div class="close">
                    <p onclick="fechar_detalhes_obra(document.getElementById('modal_exibicao'))">
                        X
                    </p>                    
                </div>
            </div>
            <div class="informacoes_obra_horizontal">
                <div class="imagem_e_categoria">
                    <div class="imagem_obra">
                        <img src="../src/obras/yuta.jpg" alt="" id="modal_imagem">
                    </div>
                    <div class="categoria_obra">
                        <p>
                            Categoria: <b id="modal_tipo">Wallpaper</b>
                        </p>
                        <div class="favorito" onclick="verificarFavorito()">
                            <img src="../src/coracao_off_icon.png" alt="" id="fav_modal">
                        </div>
                    </div>
                </div>
                <div class="descricao_obra">
                    Descrição: <b id="modal_descricao"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste deserunt asperiores, aut praesentium odio beatae porro. Modi neque qui consequatur earum reiciendis est numquam dignissimos non atque quia. Praesentium, pariatur. </b>
                </div>
            </div>
            <div class="inputs_inativados" id="modal_id_obra"> </div>
        </form>
        <form class="user_perfil_editar" method="POST" action="./verificar_edit_perfil.php" enctype="multipart/form-data" id="form_edit_perfil">
            <div class="user_perfil_modal_editar" id="edit_perfil">
                <div class="img_edit">
                    <img src="<?php echo $_SESSION['imagem_perfil_user'] ?>" class="img_edit_img">
                    <img src="../src/upload_icon.png" class="upload_icon">
                    <input type="file" class="input_edit_img" name="nova_img">
                </div>                
                <div class="conteudo">
                    <div class="close">
                        <p onclick="fechar_edit_perfil()">
                            X
                        </p>
                    </div>
                    <div class="nome">
                        <label for="novo_nome">
                            Nome:
                        </label>
                        <input type="text" name="novo_nome" value="<?php echo $_SESSION['nome_user'] ?>">
                    </div>
                    <div class="salvar_edit">
                        <p onclick="enviarEditPerfil()" class="salvar_edit_p">
                            Salvar alteração
                        </p>
                    </div>
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
                    <a href="../user_home.html" onclick="fecharMenu()">
                        <h2>
                            Obras em destaque
                        </h2>      
                    </a>              
                </div>
                <div class="guest_op_menu">
                    <a href="./user_portfolio.php" onclick="fecharMenu()">
                        <h2>
                            Portfólio
                        </h2>      
                    </a>                      
                </div>
                <div class="guest_op_menu">
                    <a href="./user_perfil.php" onclick="fecharMenu()">
                        <h2>
                            Perfil
                        </h2>      
                    </a>  
                </div>
                <div class="guest_op_menu">
                    <a href="../user_sobre_nos.html" onclick="fecharMenu()">
                        <h2>
                            Sobre nós
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
                    <p>
                        Conecte-se conosco
                    </p>
                    <div class="redes_imgs">
                        <img src="../src/instagram_icon.png">
                        <img src="../src/kofi_icon.png" id="kofi">
                    </div>
                    
                </div>
                <div class="navegacao">
                    <ul> <h2> Navegação </h2> </ul>
                    <ul> 
                        <a href="../user_home.html">
                            Obras em destaque
                        </a>    
                    </ul>
                    <ul>
                        <a href="./user_portfolio.php">
                            Portfólio
                        </a>
                    </ul>
                    <ul>
                        <a href="./user_perfil.php">
                            Perfil
                        </a>    
                    </ul>
                    <ul>
                        <a href="../user_sobre_nos.html">
                            Sobre a Daventi Design
                        </a>
                    </ul>
                </div>
                <div class="vazio"></div>
            </div>
            <div class="copyright">
                © Um projeto do grupo Daventi 2024
            </div>
        </footer>
        
        <form id="sql_favorito" action="./verificar_favorito_perfil.php" method="POST" class="inputs_inativados">
            <input type="text" class="inputs_inativados" name="src_icon" id="src_fav_icon">
            <input type="text" class="inputs_inativados" name="fav_id_obra" id="id_fav_obra">
        </form>

        <script src="../js/guest_menu.js"></script>
        <script src="../js/user_perfil.js"></script>
    </body>
    <script>
        let tamanho_obras = [];
        let novo_valor_grid_template = '';
        let linha_obras = document.getElementById('obras_linha');  
        let tamanho = '';
        // Modal
        function click_abrir_modal_horizontal(){
            document.querySelectorAll('.obra_horizontal').forEach(obra => {
            obra.addEventListener('click', function(){
                console.log("abc");

                // console.log("horizontal teste");
                
                let id = obra.getAttribute('data_id');
                abrir_detalhes_obra(document.getElementById('modal_exibicao'), id);                    
                let titulo = document.getElementById(`nome_obra_${id}`).textContent;
                let imagem = document.getElementById(`imagem_obra_${id}`).textContent;
                let descricao = document.getElementById(`descricao_obra_${id}`).textContent;
                let tipo = document.getElementById(`tipo_obra_${id}`).textContent;

                document.getElementById('modal_titulo').textContent = titulo;
                document.getElementById('modal_imagem').setAttribute('src',imagem);
                document.getElementById('modal_descricao').textContent = descricao;
                document.getElementById('modal_tipo').textContent = tipo;
                document.getElementById('modal_id_obra').textContent = id;

                // alterando icon do fav de acordo com as obras favoritadas
                fav_icon = document.getElementById('fav_modal');                   
                fav_icon.setAttribute('src', '../src/coracao_icon.png');
                // console.log('id:  ', id) ;
                let id_user = document.getElementById(`id_user_${id}`).textContent;
                // console.log('id user: ',id_user);
                // console.log('id obra: ',id);
                let obras_favoritadas = document.getElementById(`obras_fav_${id}`).textContent;

                // favoritos = [...new Set(favoritos)]; // excluindo duplicatas
                // // console.log('favoritos: ', favoritos);

                // // console.log(favoritos);                    
                // // console.log(id);
                
                // if (favoritos.includes(Number(id))) {
                //         
                // } else {                            
                //     fav_icon.setAttribute('src', '../src/coracao_off_icon.png');
                // }
                
                // console.log('id obra: ', id);
                })
            })
        }
        function click_abrir_modal_vertical(){
            document.querySelectorAll('.obra_vertical').forEach(obra => {
            obra.addEventListener('click', function(){
                // console.log("vertical teste");
                console.log("123");

                let id = obra.getAttribute('data_id');
                abrir_detalhes_obra(document.getElementById('modal_exibicao_vertical'), id);
                let titulo = document.getElementById(`nome_obra_${id}`).textContent;
                let imagem = document.getElementById(`imagem_obra_${id}`).textContent;
                let descricao = document.getElementById(`descricao_obra_${id}`).textContent;
                let tipo = document.getElementById(`tipo_obra_${id}`).textContent;

                document.getElementById('modal_titulo_vertical').textContent = titulo;
                document.getElementById('modal_imagem_vertical').setAttribute('src',imagem);
                document.getElementById('modal_descricao_vertical').textContent = descricao;
                document.getElementById('modal_tipo_vertical').textContent = tipo;
                document.getElementById('modal_id_obra').textContent = id;

                // alterando icon do fav de acordo com as obras favoritadas
                fav_icon = document.getElementById('fav_modal_vertical');       
                fav_icon.setAttribute('src', '../src/coracao_icon.png');  
          
                // console.log('id:  ', id) ;
                let id_user = document.getElementById(`id_user_${id}`).textContent;
                // console.log('id user: ',id_user);
                // console.log('id obra: ',id);
                let obras_favoritadas = document.getElementById(`obras_fav_${id}`).textContent;

                // favoritos = [...new Set(favoritos)]; // excluindo duplicatas
                // // console.log('favoritos: ', favoritos);

                // // console.log(favoritos);                    
                // // console.log(id);
                
                // if (favoritos.includes(Number(id))) {
                //     fav_icon.setAttribute('src', '../src/coracao_icon.png');    
                // } else {                            
                //     fav_icon.setAttribute('src', '../src/coracao_off_icon.png');
                // }
                // // console.log('id obra: ', id);
                })
            })
        }

        function verificarFavorito(){        
            let form_fav = document.getElementById('sql_favorito');

            let fav = document.querySelector('#fav_modal');
            let src = fav.getAttribute('src');
            let id_obra = document.getElementById('modal_id_obra').textContent;

            
            document.getElementById('id_fav_obra').value = id_obra;                
            // let a = document.getElementById('id_fav_obra').textContent;
            // console.log('asdsadasdqweqw: ', a);
            document.getElementById('src_fav_icon').value = src;

            form_fav.submit();
            // form_fav.submit();
            // if (src == '../src/coracao_icon.png'){
            //     console.log('id obra: ', id_obra);
            //     document.querySelector('#sql_favorito').innerHTML = `
                    
            //     `;                    
            // }
        }

        // Modal base
        document.querySelectorAll('.obra').forEach(obra => {
            obra.addEventListener('click', function(){
                // console.log("aaa");
                // abrir_detalhes_obra(document.getElementById('modal_exibicao'));                    
                let id = obra.getAttribute('data_id');                
                let posicao = document.getElementById(`posicao_obra_${id}`).textContent.trim();
                let titulo = document.getElementById(`nome_obra_${id}`).textContent;
                let imagem = document.getElementById(`imagem_obra_${id}`).textContent;
                let descricao = document.getElementById(`descricao_obra_${id}`).textContent;
                let tipo = document.getElementById(`tipo_obra_${id}`).textContent;
                // console.log('id da obra: ', id);
                

                // console.log(string(posicao));
                if (posicao == 'horizontal'){
                    document.getElementById('modal_titulo').textContent = titulo;
                    document.getElementById('modal_imagem').setAttribute('src',imagem);
                    document.getElementById('modal_descricao').textContent = descricao;
                    document.getElementById('modal_tipo').textContent = tipo;
                    fav_icon = document.getElementById('fav_modal');       
                    fav_icon.setAttribute('src', '../src/coracao_icon.png');
                    abrir_detalhes_obra(document.getElementById('modal_exibicao'), id);      
                    document.getElementById('modal_id_obra').textContent = id;
                } else {
                    document.getElementById('modal_titulo_vertical').textContent = titulo;
                    document.getElementById('modal_imagem_vertical').setAttribute('src',imagem);
                    document.getElementById('modal_descricao_vertical').textContent = descricao;
                    document.getElementById('modal_tipo_vertical').textContent = tipo;
                    fav_icon = document.getElementById('fav_modal_vertical');       
                    fav_icon.setAttribute('src', '../src/coracao_icon.png');
                    abrir_detalhes_obra(document.getElementById('modal_exibicao_vertical'), id);      
                    document.getElementById('modal_id_obra').textContent = id;
                }
            })
        })
        

        // Tamanho no portfolio
        document.querySelectorAll('.obra').forEach(obra => {
            // Ao clicar no botão de editar
            let data_id = obra.getAttribute('data_id');

            posicaoObra = document.querySelector(`#posicao_obra_${data_id}`).textContent.trim();
            
            if (posicaoObra == 'horizontal'){
                tamanho_obras.push('53vw'); // 67vw
                document.querySelector(`#obra_${data_id}`).className = 'obra_horizontal';
            } else if (posicaoObra == 'vertical'){
                tamanho_obras.push('21vw'); // 38vw
                document.querySelector(`#obra_${data_id}`).className = 'obra_vertical';
            }
        })
        tamanho_obras.forEach(tamanho =>{ 
            tamanho = ' ' + tamanho;
            novo_valor_grid_template += tamanho;
        })
        
        linha_obras.style.gridTemplateColumns = novo_valor_grid_template;

        const scroll_obras = document.querySelector('.fundo_exibicao_favoritos');

        // Adiciona um evento para rolar horizontalmente com a roda do mouse
        scroll_obras.addEventListener('wheel', function(event) {
            event.preventDefault();  // Impede a rolagem padrão (vertical)
            
            // Desloca horizontalmente com base no movimento vertical da roda
            scroll_obras.scrollLeft += event.deltaY; 
        });

        const parametros = new URLSearchParams(window.location.search);
        if (parametros.has('status')){
            const status = parametros.get('status');
            if (status === 'sucesso_edit'){
                alert('Editado com sucesso!');
            } else if (status === 'sucesso_desfavoritar'){
                alert('Obra desfavoritada com sucesso');
            }
            const newUrl = window.location.origin + window.location.pathname;
            window.history.replaceState({}, document.title, newUrl);
        }

        let favorito_nulo = document.getElementById('obras_linha');
        let fundo = document.getElementById('fundo_exibicao_favoritos');

        if (favorito_nulo.children.length == 0){
            console.log("teste");
            favorito_nulo.innerHTML = `
                <div class="nenhum_favorito"> Nenhuma obra favoritada </div>
            `;
            fundo.style.height = 'auto';
        }
    </script>
</html>
