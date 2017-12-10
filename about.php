<?php
// ==================================
// about
// ==================================

// verificar a sessão
if(!isset($_SESSION['a'])){
    exit();
}

//aceder à bd;
$configs = include('inc/config.php');
echo $configs['NOME_BD'];
?>
<p>ABOUT fantastico</p>

