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
        session_start();
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
            <div class="user_perfil_opcoes">                
                <form class="user_perfil_desativacao" method="POST" action="./verificar_edit_perfil.php" id="desativar_conta">
                    <p onclick="desativar_perfil()" class="cursor">
                        Desativar conta
                    </p>
                    <input class="inputs_inativados" id="inativar_perfil" name="status_user" value='0'>
                </form>
            </div>
        </main>
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
        
        <script src="../js/guest_menu.js"></script>
        <script src="../js/user_perfil.js"></script>
    </body>
    <script>
        const parametros = new URLSearchParams(window.location.search);
        if (parametros.has('status')){
            const status = parametros.get('status');
            if (status === 'sucesso_edit'){
                alert('Editado com sucesso!');
            }
            const newUrl = window.location.origin + window.location.pathname;
            window.history.replaceState({}, document.title, newUrl);
        }
    </script>
</html>
