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
        <div class="col-md-4 card m-3 p-3 text-center">            
            <p>Até à próxima visita, <?php echo $nome_cliente ?></p>
            <a href="?a=home" class="btn btn-primary">Início</a>
        </div>        
    </div>
</div>