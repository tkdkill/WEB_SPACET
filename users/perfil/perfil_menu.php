<?php
    // ========================================
    // perfil - menu inicial
    // permissão com índice = 0
    // ========================================
    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
    }

    $erro = false;
    $mensagem = '';

    //verifica se tem permissão para aceder ao sistema
    if(!funcoes::Permissoes(0)){
        $erro = true;
        $mensagem = 'Não tem permissões!';
    }


    // vai buscar totas as informações do utilizador
    $gestor = new cl_gestorBD();
    $parametros = [
        ':id_utilizador' => $_SESSION['id_utilizador']
    ];
    $dados = $gestor->EXE_QUERY(
        'SELECT * FROM utilizadores 
         WHERE id_utilizador = :id_utilizador',$parametros);
?>

<?php if($erro) : ?>
        <h3><?php echo $mensagem ?></h3>
         <!-- Voltar -->
        <div class="text-center">
            <a href="?a=inicio" class="btn btn-primary btn-size-150 m-3">Voltar</a>                  
        </div>
<?php else : ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col card m-3 p-3">
            <h4 class="text-center">PERFIL DE ÚTILIZADOR</h4>

            <!-- dados do utilizador -->
            <h5><i class="fa fa-user"></i> <?php echo $dados[0]['nome'] ?></h5>
            <p><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo $dados[0]['email']?></p>
          
             <a href="?a=perfil_alterar_password"><i class="fa fa-lock" aria-hidden="true"></i> Alterar password</a>         

        </div>
    </div>
    <!-- Voltar -->
    <div class="text-center">
        <a href="?a=inicio" class="btn btn-primary btn-size-150 m-3">Voltar</a>                  
    </div>
</div>

<?php endif; ?>