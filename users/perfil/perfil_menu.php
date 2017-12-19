<?php
     // ========================================
    // perfil - menu inicial
    // ========================================
    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
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

<div class="container">
    <div class="row justify-content-center">
        <div class="col card m-3 p-3">
            <h4 class="text-center">PERFIL DE ÚTILIZADOR</h4>

            <!-- dados do utilizador -->
            <h5><?php echo $dados[0]['nome'] ?></h5>
            <p><?php echo $dados[0]['email']?></p>

            <a href="?a=perfil_alterar_password">Alterar password</a>          

        </div>
    </div>
</div>