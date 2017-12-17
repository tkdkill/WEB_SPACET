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

//verificar o login
if(!funcoes::verificarLogin()){

    //casos especiais
    $routes_especiais = [
        'recuperar_password',
        'setup',
        'setup_criar-bd',
        'setup_inserir_utilizadores'
    ];
    //bypass do sistema normal
    if(!in_array($a, $routes_especiais)){
        $a = 'login';
    }
    
}


// ======================================
// ROUTES
// ======================================
switch ($a) {
    // ==================================
    // login
    case 'login':
        include_once('users/login.php');
        break;
    // logout
    case 'logout':                          
        include_once('users/logout.php'); 
        break;
    // recuperar password
    case 'recuperar_password':              
        include_once('users/recuperar_password.php'); 
        break;

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
    // SETUP
    //setup - criar a base de dados 
    case 'setup-criar-bd':
        include_once('setup/setup.php');
        break;
    //setup -inserir utilizadores 
    case 'setup_inserir_utilizadores':
        include_once('setup/setup.php');
        break;       
}

?>

