<?php
    // ================================================
    // utilizadores_eliminar - edita as permissões
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

    //verifica se id do utilizador está definido
    $id_utilizador = -1;
    if(isset($_GET['id'])){
        $id_utilizador = $_GET['id'];
    }else{
        $erro_permissao = true;
    }

    //verifica se pode avançar (id_utilizador != 1 ou != do da sessão
    if($id_utilizador == 1 || $id_utilizador == $_SESSION['id_utilizador']){
        $erro_permissao = true;
    }

    //=======================================================================
    $gestor = new cl_gestorBD();
    $dados_utilizador = null;
    $erro = false;
    /* $mensagem = ''; */
    if(!$erro_permissao){
        //vamos buscar os dados do utilizador
        $parametros = [':id_utilizador' => $id_utilizador];
        $dados_utilizador = $gestor->EXE_QUERY('SELECT * FROM utilizadores 
                                                WHERE id_utilizador = :id_utilizador', $parametros);

        //verifica se existe dados do utilizador
        /* if(count($dados_utilizador) == 0){
            $erro = true;
            
            $sucesso = true;
            $mensagem = 'Não foram encontrados dados do utilizador.';
        } */
    }

?>

<?php if($erro_permissao) :?>
    <?php include('inc/sem_permissao.php') ?>
<?php else : ?>   
    <!-- Erro de falta de dados -->
    <!-- Sucesso na alteração dos dados --> 
    <!-- Apresenta uma mensagem de sucesso -->
     <!-- Formulário com os dados para alteração -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-sm-8 m-3 p-3 justify-content-center">
                <h4 class="text-center alert alert-secondary">EDITAR PERMISSÕES DO UTILIZADOR</h4>
        
                    <p><i class="fa fa-user mr-2"> Nome: </i><strong><?php echo $dados_utilizador[0]['nome']; ?></strong></p>
                    <p><i class="fa fa-envelope mr-2"> E-mail: </i><strong><?php echo $dados_utilizador[0]['email']; ?></strong></p>

                    <div class="form-group">
                        <label for=""><i class="fa fa-user-circle mr-2"> Utilizador:</i></label>
                        <strong><?php echo $dados_utilizador[0]['utilizador'];?></strong>
                    </div>
                    <!-- Caixa das Permissões -->
                    <hr>
                <form action="?a=editar_permissoes&id=<?php echo $id_utilizador; ?>" method="post">   
                    <div class="caixa-permissoes">
                        <?php
                            $permissoes = include('inc/permissoes.php');
                            $id = 0;
                            //var_dump($permissoes);
                            foreach ($permissoes as $permissao) { ?>
                            <div class="checkbox">
                                <label for="check_permissao">
                                    <input type="checkbox" name="check_permissao[]" id="check_permissao" value="<?php echo $id ?>">
                                    <span class="permissoes-titulo"><?php echo  $permissao['permissao'] ?></span> 
                                </label><br>   
                                    <p class="permissoes-sumario"><?php echo  $permissao['sumario'] ?></p>
                            </div>   
                        <?php $id++; } ?>
                        <!-- Todas | nenhumas -->
                        <div>
                            <a href="#" onclick="checks(true); return false">Todas</a> | <a href="#" onclick="checks(false); return false">Nenhumas</a>
                        </div>
                        <!-- botões -->
                        <div class="text-center mt-5">
                            <a href="?a=utilizadores_gerir" class="btn btn-primary btn-size-150">Calcelar</a>
                            <button type="submit" class="btn btn-primary btn-size-150">Atualizar</button>
                        </div>            
                    </div>
                </form>                
            </div>    
        </div>              
    </div>
<?php endif; ?>
