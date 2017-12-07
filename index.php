<?php

    // ==========================================
    // Index
    // ==========================================
    // controlo de sessão
    session_start();
    if(!isset($_SESSION['a'])){
        $_SESSION['a'] = 'inicio';
    }

    include_once('_cabecalho.php');


    echo '<h1 class="text-center">Olá SPACE</h1>';

    include_once('routes.php');

    


    include_once('_rodape.php');
?>