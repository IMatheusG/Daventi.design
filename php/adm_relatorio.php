<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Relatório </title>
        <link rel="stylesheet" href="../css/reset.css" type="text/css">
        <link rel="stylesheet" href="../css/estilo_base.css" type="text/css">
        <link rel="stylesheet" href="../css/estilo_adm_relatorio.css" type="text/css">
    </head>
    <body id="body">        
        <?php 
            include('conexao.php');
            session_start();
            $sql_nenhum_order = "SELECT id_obra, titulo, tipo, posicao, visualizacoes, favoritos, status FROM obra ORDER BY id_obra;";

            $resultado_nenhum_order = $mysqli->query($sql_nenhum_order);
        ?>
        <main id="main_relatorio">
            <div class="titulo_relatorio_obras">
                <div class="titulo">
                    <h2>
                        Relatório de obras
                    </h2>
                </div>
                <table class="tabela" id='tabela_relatorio_thead'>
                    <thead>
                        <th class="relatorio_ordenador">
                            <p class="primeiro_campo_thead">
                                Id
                            </p>
                        </th>
                        <th class="relatorio_ordenador">
                            <p>
                                Título
                            </p>
                        </th>
                        <th class="relatorio_ordenador">
                            <p>
                                Tipo
                            </p>
                        </th>
                        <th class="relatorio_ordenador">
                            <p>
                                Posição
                            </p>
                        </th>
                        <th class="relatorio_ordenador">
                            <p>
                                Visualizações
                            </p>
                        </th>
                        <th class="relatorio_ordenador">
                            <p>
                                Favoritos
                            </p>
                        </th>
                        <th class="relatorio_ordenador">
                            <p class="ultimo_campo_thead">
                                Status
                            </p>
                        </th>
                    </thead>
                </table>
            </div>
            <div class="relatorio_obras" id="relatorio_obras">
                <table class="tabela" id="tabela_relatorio_tbody">
                    <thead id="thead_off">
                        <th>
                            <p class="primeiro_campo_thead">
                                Id
                            </p>
                        </th>
                        <th>
                            <p>
                                Título
                            </p>
                        </th>
                        <th>
                            <p>
                                Tipo
                            </p>
                        </th>
                        <th>
                            <p>
                                Posição
                            </p>
                        </th>
                        <th>
                            <p>
                                Visualizações
                            </p>
                        </th>
                        <th>
                            <p>
                                Favoritos
                            </p>
                        </th>
                        <th>
                            <p class="ultimo_campo_thead">
                                Status
                            </p>
                        </th>
                    </thead>
                    <tbody id="relatorio_linhas">
                        <?php 
                            while ($obra = $resultado_nenhum_order->fetch_assoc()){
                            
                        ?>
                        <tr>
                            <th>
                                <p class="primeiro_campo_thead">
                                    <?php echo $obra['id_obra']; ?>
                                </p>
                            </th>
                            <th>
                                <p>
                                    <?php echo $obra['titulo'] ?>
                                </p>
                            </th>
                            <th>
                                <p>
                                    <?php echo $obra['tipo']; ?>
                                </p>
                            </th>
                            <th>
                                <p>
                                    <?php echo $obra['posicao']; ?>
                                </p>
                            </th>
                            <th>
                                <p>
                                    <?php echo $obra['visualizacoes']; ?>
                                </p>
                            </th>
                            <th>
                                <p>
                                    <?php echo $obra['favoritos']; ?>
                                </p>
                            </th>
                            <th>
                                <p class="ultimo_campo_thead">
                                    <?php echo $obra['status']; ?>
                                </p>
                            </th>
                        </tr>
                        <?php 
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
        
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
        <script src="../js/adm_relatorio.js"></script>        
        <script>
            window.onload = function(){
                const tabela1 = document.getElementById('tabela_relatorio_thead');
                const tabela2 = document.getElementById('tabela_relatorio_tbody');
                
                // Pegue as células do tbody da Tabela 2 (segunda tabela)
                const colunasTabela2 = tabela2.querySelectorAll('tbody tr:first-child th');
                
                // Pegue as células do thead da Tabela 1 (primeira tabela)
                const colunasTabela1 = tabela1.querySelectorAll('thead th');

                // Ajuste a largura de cada célula do thead da Tabela 1 para coincidir com a largura do tbody da Tabela 2
                colunasTabela2.forEach((coluna, index) => {
                    if (colunasTabela1[index]) {
                        colunasTabela1[index].style.width = `${coluna.offsetWidth}px`;
                    }
                });
            }  
            
            // sql para ordenar o relatório
            <?php
                // Ordenação sql
                $sql_id_order = "SELECT id_obra, titulo, tipo, posicao, visualizacoes, favoritos, status FROM obra ORDER BY id_obra;";

                $sql_titulo_order = "SELECT id_obra, titulo, tipo, posicao, visualizacoes, favoritos, status FROM obra ORDER BY titulo;";

                $sql_tipo_order = "SELECT id_obra, titulo, tipo, posicao, visualizacoes, favoritos, status FROM obra ORDER BY tipo;";

                $sql_posicao_order = "SELECT id_obra, titulo, tipo, posicao, visualizacoes, favoritos, status FROM obra ORDER BY posicao;";

                $sql_visualizacoes_order = "SELECT id_obra, titulo, tipo, posicao, visualizacoes, favoritos, status FROM obra ORDER BY visualizacoes DESC;";

                $sql_favoritos_order = "SELECT id_obra, titulo, tipo, posicao, visualizacoes, favoritos, status FROM obra ORDER BY favoritos DESC;";

                $sql_status_order = "SELECT id_obra, titulo, tipo, posicao, visualizacoes, favoritos, status FROM obra ORDER BY status DESC;";

                // resultado sql
                $resultado_id_order = $mysqli->query($sql_id_order);
                $resultado_titulo_order = $mysqli->query($sql_titulo_order);
                $resultado_tipo_order = $mysqli->query($sql_tipo_order);
                $resultado_posicao_order = $mysqli->query($sql_posicao_order);
                $resultado_visualizacoes_order = $mysqli->query($sql_visualizacoes_order);
                $resultado_favoritos_order = $mysqli->query($sql_favoritos_order);
                $resultado_status_order = $mysqli->query($sql_status_order);
            ?>

            // evento e reescritra do código, para ordenar o relatório
            document.querySelectorAll('.relatorio_ordenador').forEach(campo =>{
                campo.addEventListener('click', function(){                    
                    let conteudo_campo = campo.textContent.trim();
                    if (conteudo_campo == 'Id'){
                        document.getElementById('relatorio_linhas').innerHTML = `
                            <?php 
                                while ($obra = $resultado_id_order->fetch_assoc()){
                                
                            ?>
                            <tr>
                                <th>
                                    <p class="primeiro_campo_thead">
                                        <?php echo $obra['id_obra']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['titulo'] ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['tipo']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['posicao']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['visualizacoes']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['favoritos']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p class="ultimo_campo_thead">
                                        <?php echo $obra['status']; ?>
                                    </p>
                                </th>
                            </tr>
                            <?php 
                            }
                            ?>
                        `;
                    } else if (conteudo_campo == 'Título'){
                        document.getElementById('relatorio_linhas').innerHTML = `
                            <?php 
                                while ($obra = $resultado_titulo_order->fetch_assoc()){
                                
                            ?>
                            <tr>
                                <th>
                                    <p class="primeiro_campo_thead">
                                        <?php echo $obra['id_obra']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['titulo'] ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['tipo']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['posicao']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['visualizacoes']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['favoritos']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p class="ultimo_campo_thead">
                                        <?php echo $obra['status']; ?>
                                    </p>
                                </th>
                            </tr>
                            <?php 
                            }
                            ?>
                        `;
                    } else if (conteudo_campo == 'Tipo'){
                        document.getElementById('relatorio_linhas').innerHTML = `
                            <?php 
                                while ($obra = $resultado_tipo_order->fetch_assoc()){
                                
                            ?>
                            <tr>
                                <th>
                                    <p class="primeiro_campo_thead">
                                        <?php echo $obra['id_obra']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['titulo'] ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['tipo']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['posicao']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['visualizacoes']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['favoritos']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p class="ultimo_campo_thead">
                                        <?php echo $obra['status']; ?>
                                    </p>
                                </th>
                            </tr>
                            <?php 
                            }
                            ?>
                        `;
                    } else if (conteudo_campo == 'Posição'){
                        document.getElementById('relatorio_linhas').innerHTML = `
                            <?php 
                                while ($obra = $resultado_posicao_order->fetch_assoc()){
                                
                            ?>
                            <tr>
                                <th>
                                    <p class="primeiro_campo_thead">
                                        <?php echo $obra['id_obra']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['titulo'] ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['tipo']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['posicao']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['visualizacoes']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['favoritos']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p class="ultimo_campo_thead">
                                        <?php echo $obra['status']; ?>
                                    </p>
                                </th>
                            </tr>
                            <?php 
                            }
                            ?>
                        `;
                    } else if (conteudo_campo == 'Visualizações'){
                        document.getElementById('relatorio_linhas').innerHTML = `
                            <?php 
                                while ($obra = $resultado_visualizacoes_order->fetch_assoc()){
                                
                            ?>
                            <tr>
                                <th>
                                    <p class="primeiro_campo_thead">
                                        <?php echo $obra['id_obra']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['titulo'] ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['tipo']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['posicao']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['visualizacoes']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['favoritos']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p class="ultimo_campo_thead">
                                        <?php echo $obra['status']; ?>
                                    </p>
                                </th>
                            </tr>
                            <?php 
                            }
                            ?>
                        `;
                    } else if (conteudo_campo == 'Favoritos'){
                        document.getElementById('relatorio_linhas').innerHTML = `
                            <?php 
                                while ($obra = $resultado_favoritos_order->fetch_assoc()){
                                
                            ?>
                            <tr>
                                <th>
                                    <p class="primeiro_campo_thead">
                                        <?php echo $obra['id_obra']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['titulo'] ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['tipo']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['posicao']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['visualizacoes']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['favoritos']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p class="ultimo_campo_thead">
                                        <?php echo $obra['status']; ?>
                                    </p>
                                </th>
                            </tr>
                            <?php 
                            }
                            ?>
                        `;
                    } else if (conteudo_campo == 'Status'){
                        document.getElementById('relatorio_linhas').innerHTML = `
                            <?php 
                                while ($obra = $resultado_status_order->fetch_assoc()){
                                
                            ?>
                            <tr>
                                <th>
                                    <p class="primeiro_campo_thead">
                                        <?php echo $obra['id_obra']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['titulo'] ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['tipo']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['posicao']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['visualizacoes']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p>
                                        <?php echo $obra['favoritos']; ?>
                                    </p>
                                </th>
                                <th>
                                    <p class="ultimo_campo_thead">
                                        <?php echo $obra['status']; ?>
                                    </p>
                                </th>
                            </tr>
                            <?php 
                            }
                            ?>
                        `;
                    }
                }) 
            })               
            
        </script>
    </body>
</html>