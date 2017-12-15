<?php

    // ==========================================
    // Index
    // ==========================================
    // controlo de sessão
    session_start();
    if(!isset($_SESSION['a'])){
        $_SESSION['a'] = 'inicio';
    }

    //inclui as funções necessárias do sistema

    include_once('inc/gestorBD.php');

    include_once('_cabecalho.php');

    include_once('routes.php');

    include_once('_rodape.php');
?>