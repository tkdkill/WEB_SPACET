<?php 
    // ========================================
    // logout cliente
    // ========================================
    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
    }
    $nome_cliente = $_SESSION['nome_cliente'];
    //executa o logout (destruição) da sessão
    funcoes::DestroiSessaoCliente();

    //Cria Log
    /* funcoes::CriarLOG('Utilizador ' . $nome . ' fez logout', $nome); */
?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4 card mt-5 mb-5 p-4 text-center">            
            <p>Até à próxima visita, <?php echo $nome_cliente ?></p>
            <div class="col-12 text-center mt-2">
                <a href="?a=home" class="btn btn-primary btn-size-150">Início</a>
            </div>
        </div>        
    </div>
</div>