<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link rel="stylesheet" href="../css/reset.css" type="text/css">
        <link rel="stylesheet" href="../css/estilo_base.css" type="text/css">
        <link rel="stylesheet" href="../css/estilo_cadastro.css " type="text/css">
        <title> Daventi Login </title>
    </head>
    <body>
        <div class="login_divisa">
              
        </div>        
        <main>
            <div class="cadastro_lado_esquerdo">
                <div class="cadastro_voltar">
                    <a href="./login.php">
                        <p>
                            Voltar
                        </p>
                    </a>
                </div>
                <h2>
                    Realize o cadastro para se juntar a Daventi!
                </h2>
                <form class="cadastro_form" method="POST" action="verificar_cadastro.php">
                    <div class="input">
                        <label for="nome"> 
                            Nome
                        </label>
                        <input type="text" name="nome" required>
                    </div>
                    <div class="input">
                        <label for="email"> 
                            Email
                        </label>
                        <input type="email" name="email" required>
                    </div>
                    <div class="input">
                        <label for="senha"> 
                            Senha
                        </label>
                        <input type="password" name="senha" required>
                    </div>                    
                    <input type="submit" value="Cadastrar">                    
                </form>
            </div>    
            <div class="cadastro_lado_direito">
                <h2>
                    Já tem uma conta?
                </h2>
                <div class="cadastro_cta_login">
                    Prossiga para o botão abaixo e logue na Daventi
                </div>
                <div class="cadastro_voltar">
                    <a href="./login.php">
                        <p>
                            Logue aqui
                        </p>
                    </a>
                </div>
            </div>
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
        <header>
            <h1>
                Daventi
            </h1>
        </header>
    </body>
    <script>
        window.onload = function(){
            const parametros = new URLSearchParams(window.location.search);
            if (parametros.has('status')){
                const status = parametros.get('status');
                if (status === '0'){
                    alert('Preencha todos os campos para realizar o cadastro');
                }                 
                if (status === '2'){
                    alert('Email já cadastrado');
                }
                const newUrl = window.location.origin + window.location.pathname;
                window.history.replaceState({}, document.title, newUrl);
            }
        }
    </script>
</html>