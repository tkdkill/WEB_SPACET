<?php
    // ==================================
    // adicionar útilizadores
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col card m-3 p-3 text-center">
            <div class="text-center">
                <h1>Criar utilizador</i></h1>
                
                <a href="?a=inicio" class="btn btn-primary btn-size-150">Voltar</a>
            </div>                  
        </div>
    </div>
</div>