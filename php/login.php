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
                    <div id="login_cta_p">                        
                        <b>Para segurança de nosso site, as obras só estão acessiveis após a realização do login.</b>
                        <b>Caso ainda não tenha uma conta, faça seu cadastro!</b>
                    </div>
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
                        <input type="email" name="email" required>
                    </div>
                    <div class="login_input">
                        <label for="senha"> 
                            Senha
                        </label>
                        <input type="password" name="senha" required>
                    </div>
                </div>
                <div class="login_login_btn">
                    <input type="submit" value="Logar">
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
                    <a class="redes_imgs" href="https://ko-fi.com/daventishop">
                        <img src="../src/kofi_icon.png" id="kofi">
                    </a>                           
                </div>                
            </div>
            <div class="copyright">
                © Um projeto do grupo Daventi 2024
            </div>
        </footer>
        <header>
            <h1>
                Daventi
            </h1>
        </header>
        <script>            
            window.onload = function(){
                const parametros = new URLSearchParams(window.location.search);
                if (parametros.has('status')){                    
                    var status = parametros.get('status');
                    if (status === '1'){
                        alert('Cadastro realizado com sucesso! Digite seu dados cadastrados para realizar o login');                     
                    } else if (status === '2'){
                        alert('Email ou senha incorreto');
                    } else if (status === '3'){
                        alert('Preencha todos os campos para realizar o login');
                    } else if (status === 'user_inativado'){
                        alert('Conta desativada com sucesso');
                    } else if (status === 'conta_desativada'){
                        alert('Esta conta está desativada, por favor utilize outra');
                    } 
                    const newUrl = window.location.origin + window.location.pathname;
                    window.history.replaceState({}, document.title, newUrl);
                }
            }
        </script>
    </body>
</html>