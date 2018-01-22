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

?>

<?php if($erro_permissao) :?>

    <?php include('inc/sem_permissao.php') ?>

<?php else : ?>
    editar permissões
<?php endif; ?>
