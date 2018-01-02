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
                    <!-- Útilizador -->
                    <div class="form-group">
                        <label for="text_utilizador">Utilizador:</label>
                        <input id="text_utilizador" 
                               placeholder="UserName"   
                               type="text" 
                               name="text_utilizador" 
                               class="form-control" 
                               pattern=".{3,50}" 
                               title="Entre 3 a 50 caracteres." 
                               required>                 
                    </div>

                     <!-- password -->
                     <div class="form-group">
                        <label for="text_password">Password:</label>
                        <div class="row">
                            <div class="col"> 
                                <input id="text_password" 
                                       placeholder="Password" 
                                       type="text" 
                                       class="form-control" 
                                       name="text_password" 
                                       class="form-control" 
                                       pattern=".{3,30}" 
                                       title="Entre 3 a 50 caracteres." 
                                       required>                
                            </div>
                             <div class="col">
                                <button type="button" class="btn btn-primary form-control" onclick="gerarPassword(10)">Gerar Password</button> 
                            </div>
                        </div>
                    </div>
                      <!-- Nome Completo -->
                    <div class="form-group">
                        <label for="text_nome">Nome:</label>
                        <input id="text_nome" 
                               placeholder="Nome completo" 
                               type="text" 
                               name="text_nome" 
                               class="form-control" 
                               pattern=".{3,50}" 
                               title="Entre 3 a 50 caracteres." 
                               required>                 
                    </div  >
                    <!-- Email -->
                    <div class="form-group">
                        <label for="text_email">E-mail:</label>
                        <input id="text_email" 
                               placeholder="exemple@gmail.com" 
                               type="email" 
                               name="text_email" 
                               class="form-control" 
                               pattern=".{3,50}" 
                               title="Entre 3 a 50 caracteres." 
                               required>                 
                    </div>                        
                    <div class="text-center">
                        <a href="?a=utilizadores_gerir" class="btn btn-primary btn-size-150">Calcelar</a>
                        <button class="btn btn-primary btn-size-150">Criar útilizador</button>
                    </div>
                    <hr>
                    <div class="text-center m-3">
                        <button type="button" 
                                class="btn btn-primary btn-size-150" 
                                data-toggle="collapse" 
                                data-target="#caixa_permissoes" 
                                aria-expanded="false" 
                                aria-controls="collapseExample">Definir permissões</button>
                    </div>
                    <!-- Caixa das Permissões -->             
                    <div class="collapse" id="caixa_permissoes">
                        <div class="card p-3">
                            
                            <?php
                                $permissoes = include_once('inc/permissoes.php');
                                //var_dump($permissoes);
                               foreach ($permissoes as $permissao) { ?>
                                <div class="checkbox">
                                    <label for="check_permissao">
                                        <input type="checkbox" name="check_permissao[]" id="check_permissao" value="titulo da permissao">
                                        <span class="permissoes-titulo"><?php echo  $permissao['permissao'] ?></span> 
                                    </label><br>   
                                    <span class="permissoes-sumario"><?php echo  $permissao['sumario'] ?></span>
                                </div>
                                   
                            <?php } ?>

                        </div>
                    </div>                  
                                  
                </form>                 
        </div>
    </div>
</div>