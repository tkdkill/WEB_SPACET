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
?>

<?php if($erro_permissao) :?>

    <?php include('inc/sem_permissao.php') ?>

<?php else : ?>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col card m-3 p-3">
                <h4 class="text-center">ELIMINAR UTILIZADORES</h4>
                <!-- Dados do utilizador -->
                <div class="row justify-content-left">
                    <div class="col-xs-6 offset-xs-6 card">
                        <p>Deseja mesmo eliminar o utilizador!</p>

                        <?php foreach ($dados_utilizador as $utilizador) : ?>
                        <p><i>Nome: </i><?php echo $utilizador['nome']; ?></p>
                        <p><i>E-mail: </i><?php echo $utilizador['email']; ?></p>
                        <?php endforeach;?>

                    </div>
                </div>    
                <div class="text-center">
                    <a href="?a=utilizadores_gerir" class="btn btn-primary btn-size-150">Não</a>
                    <a href="?a=#" class="btn btn-primary btn-size-150">Sim</a>
                </div>        
            </div>
        </div>
    </div>
        
<?php endif; ?>

