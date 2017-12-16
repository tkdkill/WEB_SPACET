<?php
    // ========================================
    // formulário de login
    // ========================================    
    
    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
    }
    /*
    - formulário que permite colocar um endereço de email
    - submeter o formulário e procurar o endereço de email na tabela dos utilizadores
    - se for encontrado um email, reformular a password e envia email para o usuário/utilizador
    - informa qual é a nova password
    */
?>