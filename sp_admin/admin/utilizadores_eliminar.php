<?php
    // ================================================
    // utilizadores_eliminar - eliminar utilizador
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
    $dados_utilizador = '';
    $gestor = new cl_gestorBD();
    if(!$erro_permissao){
        //buscar os dados do utilizador
        $parametros = [':id_utilizador' => $id_utilizador];
        $dados_utilizador = $gestor->EXE_QUERY('SELECT * FROM utilizadores WHERE id_utilizador = :id_utilizador', $parametros);
    }

    //=======================================================================
    // verifica se foi dada resposta afirmativa para eliminar
    $sucesso = false;
    if(isset($_GET['r'])){
        if($_GET['r'] == 1){
            
            //remover o utilizador da base de dados
            $parametros = [':id_utilizador' => $id_utilizador];
            $gestor->EXE_NON_QUERY('DELETE FROM utilizadores WHERE id_utilizador = :id_utilizador', $parametros);

            //Informa o sistema que a remoção do utilizador aconteceu com sucesso
            $sucesso = true;
        }
    }
?>

<!-- sem permissão -->
<?php if($erro_permissao) :?>
    <?php include('inc/sem_permissao.php') ?>
<?php else : ?>

<!-- remoção com sucesso -->
<?php if($sucesso) : ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col card m-3 p-3">
                <h4 class="text-center alert alert-secondary" role="alert">REMOVER UTILIZADORES</h4>
                <!-- Dados do utilizador -->
                <div class="row justify-content-center">
                    <div class="col-md-8 offset-md-2 card m-3 p-3">
                        <p class="alert alert-success text-center" role="alert">Utilizador removido com sucesso.</p>
                    </div>
                </div>
                    <div class="text-center">
                        <a href="?a=utilizadores_gerir" class="btn btn-primary btn-size-150">Voltar</a>
                    </div>    
                </div>
            </div>
        </dive>
    </div>               
<?php else : ?>

    <!-- apesentação dos dados do utilizador a remover -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col card m-3 p-3">
                <h4 class="text-center alert alert-secondary" role="alert">REMOVER UTILIZADORES</h4>
                <!-- Dados do utilizador -->
                <div class="row justify-content-center">
                    <div class="col-md-8 offset-md-2 card m-3 p-3">
                        <p class="alert alert-danger text-center" role="alert">Tem a certesa que pretende eliminar o utilizador?</p>

                        <?php foreach ($dados_utilizador as $utilizador) : ?>
                        <p><i class="fa fa-user mr-2"> Nome: </i><strong><?php echo $utilizador['nome']; ?></strong></p>
                        <p><i class="fa fa-envelope mr-2"> E-mail: </i><strong><?php echo $utilizador['email']; ?></strong></p>
                        <?php endforeach;?>

                    </div>
                </div>    
                <div class="text-center">
                    <!-- Botões não e sim -->
                    <a href="?a=utilizadores_gerir" class="btn btn-primary btn-size-150">Não</a>
                    <a href="?a=eliminar_utilizador&id=<?php echo $id_utilizador; ?>&r=1" class="btn btn-primary btn-size-150">Sim</a>
                </div>        
            </div>
        </div>
    </div>
        
<?php endif; ?>
<?php endif; ?>

