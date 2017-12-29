<?php
    // ================================================
    // adicionar útilizadores adicionar novo utilizador
    // ================================================

    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
    }
    
    //verificar permissões
    $erro_permissao = false;
    if(!funcoes::Permissoes(0)){
        $erro_permissao = true;

    }

    //=========================================================================================

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 card m-3 p-3">
                <h4 class="text-center">Adicionar novo utilizador</i></h4>
                <hr>

                <!-- Formulário para adicionar novo utilizador -->
                <form action="?a=utilizador_adicionar" method="post">
                    <!-- Nome -->
                    <div class="form-group">
                        <label for="textutilizador">Utilizador:</label>
                        <input id="textutilizador" type="text" name="text_utilizador" class="form-control" pattern=".{3,50}" title="Entre 3 a 50 caracteres." required>                 
                    </div>

                     <!-- password -->
                     <div class="form-group">
                        <label for="text_password">Password:</label>

                        <div class="row">
                            <div class="col"> 
                                <input id="text_password" placeholder="Password" type="text" class="form-control" name="text_password" class="form-control" pattern=".{3,30}" title="Entre 3 a 50 caracteres." required>                
                            </div>
                             <div class="col">
                                <button type="button" class="btn btn-primary form-control" onclick="gerarPassword(10)">Gerar Password</button> 
                            </div>
                        </div>
                    </div>
                        
                </form>

             <div class="text-center">
                <a href="?a=utilizadores_gerir" class="btn btn-primary btn-size-150">Voltar</a>
            </div>                  
        </div>
    </div>
</div>