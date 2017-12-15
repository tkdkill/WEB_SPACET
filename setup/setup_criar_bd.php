<?php
// ==================================
// setup - criar a base de dados
// ==================================

// verificar a sessão
if(!isset($_SESSION['a'])){
    exit();
}
    // verifica se a está definido na URL
    $a = '';
    if(isset($_GET['a'])){
        $a = $_GET['a'];
    }

    //criar a base de dados
?>
<div class="alert alert-success text-center">Base de dados criada com sucesso.</div>