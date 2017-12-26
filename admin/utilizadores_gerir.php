<?php
    // ==================================
    // gestão de útilizadores
    // ==================================

    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
    }
    
    //verificar permissões
    $erro_permissao = false;
    if(!funcoes::Permissoes(0)){
        $erro_permissao = true;

    }

?>

<?php if($erro_permissao) :?>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col card m-3 p-3">
            <p class="text-center">Não tem permissão para esta funcionalidade</p>          
            <a href="?a=inicio" class="btn btn-primary btn-size-150">Voltar</a>
        </div>
    </div>
</div>

<?php else : ?>
    <div class="container">
    <div class="row justify-content-center">
        <div class="col card m-3 p-3">
            <h4 class="text-center">GESTÃO DE UTILIZADORES</h4>          

        </div>
    </div>
</div>
<?php endif; ?>
