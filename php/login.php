<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link rel="stylesheet" href="../css/reset.css" type="text/css">
        <link rel="stylesheet" href="../css/estilo_base.css">
        <link rel="stylesheet" href="../css/estilo_login.css " type="text/css">
        <title> Daventi Login </title>
    </head>
    <body>
        <div class="login_divisa">
              
        </div>
        <header>
            <h1>
                Daventi
            </h1>
        </header>
        <main>
            <div class="login_lado_cadastro">
                <div class="login_voltar">
                    <a href="../guest_landing_page.html">
                        <p>
                            Voltar
                        </p>                    
                    </a>
                </div>
                <div class="login_cta_cadastro">
                    <div class="login_cta_titulo">
                        <h2>
                            Bem vindo!
                        </h2>
                    </div>
                    <p id="login_cta_p">                        
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Enim saepe voluptatem veniam consequuntur reiciendis doloribus explicabo voluptate. Incidunt fugiat assumenda voluptatibus quia ipsam odit magnam quae error, illo mollitia sint.
                    </p>
                    <div class="login_cta_cadastro_btn">
                        <a href="./cadastro.php">
                            <p>
                                Cadastre-se aqui
                            </p>                            
                        </a>
                    </div>
                </div>
            </div>
            <form class="login_lado_login" method='POST' action='verificar_login.php'>
                <div class="titulo">
                    <h2>
                       Junte-se a nós novamente!
                    </h2>
                </div>
                <div class="login_inputs_login">
                    <div class="login_input">
                        <label for="email"> 
                            Email
                        </label>
                        <input type="text" id="email">
                    </div>
                    <div class="login_input">
                        <label for="senha"> 
                            Senha
                        </label>
                        <input type="text" id="senha">
                    </div>
                </div>
                <div class="login_login_btn">
                    <a href="">
                        <p>
                            Logar
                        </p>                    
                    </a>
                </div>
            </form>            
        </main>        
        <footer>
            <div class="vazio">

            </div>
            <div class="opcoes opcoes_login">                
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
            </div>
            <div class="copyright">
                © Um projeto do grupo Daventi 2024
            </div>
        </footer>
        <script>
            let aviso = 0;

            window.onload = function(){
                const parametros = new URLSearchParams(window.location.search);
                if (parametros.has('status')){                    
                    var status = parametros.get('status');
                    if (status === '1' && !sessionStorage.getItem('alerta')){
                        alert('Cadastro realizado com sucesso! Digite seu dados cadastrados para realizar o login'); 
                        aviso = 1;
                        sessionStorage.setItem('alerta', 'true');
                    }
                }
            }
        </script>
    </body>
</html>