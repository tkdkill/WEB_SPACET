<?php
// ==================================
// routes
// ==================================

// verificar a sessão
if(!isset($_SESSION['a'])){
    exit();
}

$a = 'inicio';
if(isset($_GET['a'])){
    $a = $_GET['a'];
}

// ==================================
// ROUTS
// ==================================
switch ($a) {
    //apresentar a página inicial
    case 'inicio':
        include_once('inicio.php');
        break;
    //apresenta a página acerca de
    case 'about':
        include_once('about.php');
        break;
    //abre o menu do setup
    case 'setup':
        include_once('setup/instalacao.php');
        break;
    default:
        # code...
        break;
}

?>

