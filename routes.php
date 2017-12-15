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
// ROUTES
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
        include_once('setup/setup.php');
        break;

    //===============================
    // setups
    //setup - criar a base de dados 
    case 'setup-criar-bd':
        include_once('setup/setup.php');
        break;
    //setup -inserir utilizadores 
    case 'setup_inserir_utilizadores':
        include_once('setup/setup.php');
        break;    


    default:
        # code...
        break;    
}

?>

