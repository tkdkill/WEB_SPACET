<?php 
    // ========================================
    // setup - inserir utilizadores
    // ========================================
    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
    } 
    //inserir o utilizador admin
    $gestor = new cl_gestorBD();
    $data = new DateTime();
    
    //definição de parametros
    $parametros = [
        ':utilizador'       => 'admin',
        ':palavra_passe'    => md5('admin'),
        ':nome'             => 'Administrador',
        ':email'            => 'admin@teste.com',
        ':criado_em'        => $data->format('Y-m-d H:i:s'),
        ':atualizado_em'    => $data->format('Y-m-d H:i:s')
    ];
    //inserir o utilizador
    $gestor->EXE_NON_QUERY(
        'INSERT INTO utilizadores(utilizador, palavra_passe, nome, email, criado_em, atualizado_em)
         VALUES(:utilizador, :palavra_passe, :nome, :email, :criado_em, :atualizado_em)',
         $parametros);

?>

<div class="alert alert-success text-center">Utilizadores inseridos com sucesso.</div>