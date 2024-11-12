<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Portfólio </title>
        <link rel="stylesheet" href="../css/reset.css" type="text/css">
        <link rel="stylesheet" href="../css/estilo_base.css" type="text/css">
        <link rel="stylesheet" href="../css/estilo_user_portfolio.css" type="text/css">
    </head>
    <body id="body">        
        <?php 
            include('conexao.php');
            session_start();

            $_SESSION['favoritos_user'] = [];
            $favorito_user = $_SESSION['favoritos_user'];
            $id_user = $_SESSION['id_user'];

            $sql_select_favorito = "SELECT u.id_user,f.id_favorito, f.obra_id_favorito
            FROM usuario u 
            INNER JOIN favorito f ON u.id_user  = f.user_id_favorito 
            INNER JOIN obra o ON f.obra_id_favorito = o.id_obra
            WHERE u.id_user = $id_user;";

            $resultado_select_favorito = $mysqli->query($sql_select_favorito);

            while ($favorito = $resultado_select_favorito->fetch_assoc()){   
                array_push($favorito_user, $favorito['obra_id_favorito']);                
            } 

            
            $_SESSION['favoritos_user'] = $favorito_user;
            // $a = $_SESSION['favoritos_user'];
            
            // echo "
            // <script> 
            
            // document.write('fav: ', $a[0]);             
            // document.write('fav: ', $a[1]);             
            // document.write('fav: ', $a[2]);             
            // </script>
            // ";

            $sql_select_nenhum_filtro = 'SELECT * FROM obra WHERE status = 1 ORDER BY id_obra';
            $resultado_nenhum = $mysqli->query($sql_select_nenhum_filtro);
        ?>
        <main id="main_portfolio">
            <div class="portfolio_filtros"> 
                <p>
                    Filtros:
                </p>
                <div class="filtro">
                    <input type="radio" id="nenhum" value="Nenhum" name="filter" checked class="radio_filtro"> 
                    <label for="nenhum">Nenhum</label>
                </div>
                <div class="filtro">
                    <input type="radio" id="poster" value="poster" name="filter" class="radio_filtro"> 
                    <label for="poster">Poster</label>
                </div>
                <div class="filtro">
                    <input type="radio" id="postagem" value="postagem" name="filter" class="radio_filtro">
                    <label for="postagem">Postagem</label>
                </div>
                <div class="filtro">
                    <input type="radio" id="wallpaper" value="wallpaper" name="filter" class="radio_filtro">
                    <label for="wallpaper">Wallpaper</label>
                </div>
            </div>
            <div class="porfolio_obras"> <!-- todas as obras -->
                <script> let favoritos = []; </script>
                <div class="obras_linha" id="obras_linha"> <!-- linha com as obras -->
                    <?php 
                        while ($obra = $resultado_nenhum->fetch_assoc()){
                        
                    ?>
                    <div class="obra" id="obra_<?php echo $obra['id_obra'] ?>" data_id="<?php echo $obra['id_obra']?>"> 
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
        </main>
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
                        <div class="favorito" onclick="favoritarObra()">
                            <img src="../src/coracao_off_icon.png" alt="" id="fav_modal">
                        </div>
                    </div>
                </div>
                <div class="descricao_obra">
                    Descrição: <b id="modal_descricao"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste deserunt asperiores, aut praesentium odio beatae porro. Modi neque qui consequatur earum reiciendis est numquam dignissimos non atque quia. Praesentium, pariatur. </b>
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
        <form action=""> <!-- form pra enviar o filtro --> 

        </form>              
        <script src="../js/guest_menu.js"></script>
        <script src="../js/user_porfolio.js"></script>        
        <script>
            let tamanho_obras = [];
            let novo_valor_grid_template = '';
            let linha_obras = document.getElementById('obras_linha');  
            let tamanho = '';
            // Filtro
            <?php 
                $sql_select_filtro_poster = "SELECT * FROM obra WHERE tipo = 'Poster' ORDER BY id_obra";
                $sql_select_filtro_postagem = "SELECT * FROM obra WHERE tipo = 'Postagem' ORDER BY id_obra";
                $sql_select_filtro_wallpaper = "SELECT * FROM obra WHERE tipo = 'Wallpaper' ORDER BY id_obra";

                $resultado_poster = $mysqli->query($sql_select_filtro_poster);
                $resultado_postagem = $mysqli->query($sql_select_filtro_postagem);
                $resultado_wallpaper = $mysqli->query($sql_select_filtro_wallpaper);
            ?>

            let obras = document.getElementById('obras_linha');
            document.querySelectorAll('.radio_filtro').forEach(filtro => {                
                filtro.addEventListener('click',function(){
                    let tipo_filtro = filtro.getAttribute('id');
                    if (tipo_filtro == 'nenhum'){
                        obras.innerHTML = `
                            <?php 
                                $resultado = $mysqli->query("SELECT * FROM obra WHERE status = 1");
                                while ($obra = $resultado->fetch_assoc()){                    
                            ?>
                            <div class="obra" id="obra_<?php echo $obra['id_obra'] ?>" data_id="<?php echo $obra['id_obra']?>"> 
                                <img src="<?php echo $obra['imagem'] ?>" alt="">
                            </div> 
                            <div class="inputs_inativados" id="posicao_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['posicao'] ?> </div>

                            <div class="inputs_inativados" id="nome_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['titulo'] ?> </div>

                            <div class="inputs_inativados" id="imagem_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['imagem'] ?> </div>

                            <div class="inputs_inativados" id="descricao_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['descricao'] ?> </div>

                            <div class="inputs_inativados" id="tipo_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['tipo'] ?> </div>

                            <div class="inputs_inativados" id="id_user_<?php echo $_SESSION['id_user'] ?>"> <?php echo $_SESSION['id_user'] ?> </div>

                            <?php 
                            }
                            ?>
                        `     
                    } else if(tipo_filtro == 'poster'){
                        obras.innerHTML = `
                            <?php 
                                $resultado = $mysqli->query("SELECT * FROM obra WHERE status = 1 AND tipo = 'poster'");
                                while ($obra = $resultado->fetch_assoc()){                    
                            ?>
                            <div class="obra" id="obra_<?php echo $obra['id_obra'] ?>" data_id="<?php echo $obra['id_obra']?>"> 
                                <img src="<?php echo $obra['imagem'] ?>" alt="">
                            </div> 
                            <div class="inputs_inativados" id="posicao_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['posicao'] ?> </div>

                            <div class="inputs_inativados" id="nome_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['titulo'] ?> </div>

                            <div class="inputs_inativados" id="imagem_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['imagem'] ?> </div>

                            <div class="inputs_inativados" id="descricao_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['descricao'] ?> </div>

                            <div class="inputs_inativados" id="tipo_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['tipo'] ?> </div>

                            <div class="inputs_inativados" id="id_user_<?php echo $_SESSION['id_user'] ?>"> <?php echo $_SESSION['id_user'] ?> </div>

                            <?php 
                            }
                            ?>
                        ` 
                    } else if(tipo_filtro == 'postagem'){
                        obras.innerHTML = `
                            <?php 
                                $resultado = $mysqli->query("SELECT * FROM obra WHERE status = 1 AND tipo = 'postagem'");
                                while ($obra = $resultado->fetch_assoc()){                    
                            ?>
                            <div class="obra" id="obra_<?php echo $obra['id_obra'] ?>" data_id="<?php echo $obra['id_obra']?>"> 
                                <img src="<?php echo $obra['imagem'] ?>" alt="">
                            </div> 
                            <div class="inputs_inativados" id="posicao_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['posicao'] ?> </div>

                            <div class="inputs_inativados" id="nome_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['titulo'] ?> </div>

                            <div class="inputs_inativados" id="imagem_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['imagem'] ?> </div>

                            <div class="inputs_inativados" id="descricao_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['descricao'] ?> </div>

                            <div class="inputs_inativados" id="tipo_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['tipo'] ?> </div>

                            <div class="inputs_inativados" id="id_user_<?php echo $_SESSION['id_user'] ?>"> <?php echo $_SESSION['id_user'] ?> </div>

                            
                            <?php 
                            }
                            ?>
                        ` 
                    } else if(tipo_filtro == 'wallpaper'){
                        obras.innerHTML = `
                            <?php 
                                $resultado = $mysqli->query("SELECT * FROM obra WHERE status = 1 AND tipo = 'wallpaper'");
                                while ($obra = $resultado->fetch_assoc()){                    
                            ?>
                            <div class="obra" id="obra_<?php echo $obra['id_obra'] ?>" data_id="<?php echo $obra['id_obra']?>"> 
                                <img src="<?php echo $obra['imagem'] ?>" alt="">
                            </div> 
                            <div class="inputs_inativados" id="posicao_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['posicao'] ?> </div>

                            <div class="inputs_inativados" id="nome_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['titulo'] ?> </div>

                            <div class="inputs_inativados" id="imagem_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['imagem'] ?> </div>

                            <div class="inputs_inativados" id="descricao_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['descricao'] ?> </div>

                            <div class="inputs_inativados" id="tipo_obra_<?php echo $obra['id_obra'] ?>"> <?php echo $obra['tipo'] ?> </div> 

                            <div class="inputs_inativados" id="id_user_<?php echo $_SESSION['id_user'] ?>"> <?php echo $_SESSION['id_user'] ?> </div>

                            
                            <?php 
                            }
                            ?>
                        `
                    }     
                    tamanho_obras = [];
                    novo_valor_grid_template = '';
                    document.querySelectorAll('.obra').forEach(obra => {
                        // Ao clicar no botão de editar
                        let data_id = obra.getAttribute('data_id');

                        posicaoObra = document.querySelector(`#posicao_obra_${data_id}`).textContent.trim();
                        
                        if (posicaoObra == 'horizontal'){
                            tamanho_obras.push('53vw'); // 67vw
                            document.querySelector(`#obra_${data_id}`).className = 'obra_horizontal';
                            document.querySelector(`#obra_${data_id}`).addEventListener('click', click_abrir_modal_horizontal());
                        } else if (posicaoObra == 'vertical'){
                            tamanho_obras.push('21vw'); // 38vw
                            document.querySelector(`#obra_${data_id}`).className = 'obra_vertical';
                            document.querySelector(`#obra_${data_id}`).addEventListener('click', click_abrir_modal_vertical());
                        }
                    })                    
                    tamanho_obras.forEach(tamanho =>{ 
                        tamanho = ' ' + tamanho;
                        novo_valor_grid_template += tamanho;
                    })                    
                    linha_obras.style.gridTemplateColumns = novo_valor_grid_template;      
                })
            })

            // Modal
            function click_abrir_modal_horizontal(){
                document.querySelectorAll('.obra_horizontal').forEach(obra => {
                obra.addEventListener('click', function(){
                    abrir_detalhes_obra(document.getElementById('modal_exibicao'));                    
                    let id = obra.getAttribute('data_id');
                    let titulo = document.getElementById(`nome_obra_${id}`).textContent;
                    let imagem = document.getElementById(`imagem_obra_${id}`).textContent;
                    let descricao = document.getElementById(`descricao_obra_${id}`).textContent;
                    let tipo = document.getElementById(`tipo_obra_${id}`).textContent;

                    document.getElementById('modal_titulo').textContent = titulo;
                    document.getElementById('modal_imagem').setAttribute('src',imagem);
                    document.getElementById('modal_descricao').textContent = descricao;
                    document.getElementById('modal_tipo').textContent = tipo;
                    
                    // alterando icon do fav de acordo com as obras favoritadas
                    fav_icon = document.getElementById('fav_modal');                   
                    console.log('id:  ', id) ;
                    let id_user = document.getElementById(`id_user_${id}`).textContent;
                    let obras_favoritadas = document.getElementById(`obras_fav_${id}`).textContent;
                    
                    favoritos = [...new Set(favoritos)]; // excluindo duplicatas
                    
                    // console.log(favoritos);                    
                    // console.log(id);
                    
                    if (favoritos.includes(Number(id))) {
                        fav_icon.setAttribute('src', '../src/coracao_icon.png');    
                    } else {                            
                        fav_icon.setAttribute('src', '../src/coracao_off_icon.png');
                    }
                    
                    })
                })
            }
            function click_abrir_modal_vertical(){
                document.querySelectorAll('.obra_vertical').forEach(obra => {
                obra.addEventListener('click', function(){
                    abrir_detalhes_obra(document.getElementById('modal_exibicao'));                    
                    let id = obra.getAttribute('data_id');
                    let titulo = document.getElementById(`nome_obra_${id}`).textContent;
                    let imagem = document.getElementById(`imagem_obra_${id}`).textContent;
                    let descricao = document.getElementById(`descricao_obra_${id}`).textContent;
                    let tipo = document.getElementById(`tipo_obra_${id}`).textContent;

                    document.getElementById('modal_titulo').textContent = titulo;
                    document.getElementById('modal_imagem').setAttribute('src',imagem);
                    document.getElementById('modal_descricao').textContent = descricao;
                    document.getElementById('modal_tipo').textContent = tipo;

                    // alterando icon do fav de acordo com as obras favoritadas
                    fav_icon = document.getElementById('fav_modal');     
                    console.log('id:  ', id) ;
               
                    let id_user = document.getElementById(`id_user_${id}`).textContent;
                    console.log('id_user:  ', id_user) ;
                    let obras_favoritadas = document.getElementById(`obras_fav_${id}`).textContent;
                    
                    favoritos = [...new Set(favoritos)]; // excluindo duplicatas
                    
                    // console.log(favoritos);                    
                    // console.log(id);
                    
                    if (favoritos.includes(Number(id))) {
                        fav_icon.setAttribute('src', '../src/coracao_icon.png');    
                    } else {                            
                        fav_icon.setAttribute('src', '../src/coracao_off_icon.png');
                    }
                    })
                })
            }
            
            
            // Modal base
            document.querySelectorAll('.obra').forEach(obra => {
                obra.addEventListener('click', function(){
                    abrir_detalhes_obra(document.getElementById('modal_exibicao'));                    
                    let id = obra.getAttribute('data_id');
                    let titulo = document.getElementById(`nome_obra_${id}`).textContent;
                    let imagem = document.getElementById(`imagem_obra_${id}`).textContent;
                    let descricao = document.getElementById(`descricao_obra_${id}`).textContent;
                    let tipo = document.getElementById(`tipo_obra_${id}`).textContent;

                    document.getElementById('modal_titulo').textContent = titulo;
                    document.getElementById('modal_imagem').setAttribute('src',imagem);
                    document.getElementById('modal_descricao').textContent = descricao;
                    document.getElementById('modal_tipo').textContent = tipo;


                    // alterando icon do fav de acordo com as obras favoritadas
                    fav_icon = document.getElementById('fav_modal');                    
                    let id_user = document.getElementById(`id_user_${id}`).textContent;
                    let obras_favoritadas = document.getElementById(`obras_fav_${id}`).textContent;
                    
                    favoritos = [...new Set(favoritos)]; // excluindo duplicatas
                    
                    // console.log(favoritos);                    
                    // console.log(id);
                    
                    if (favoritos.includes(Number(id))) {
                        fav_icon.setAttribute('src', '../src/coracao_icon.png');    
                    } else {                            
                        fav_icon.setAttribute('src', '../src/coracao_off_icon.png');
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

            
  
        </script>
    </body>
</html>