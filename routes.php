<?php
// ==================================
// routes da página web
// ==================================

// verificar a sessão
if(!isset($_SESSION['a'])){
    exit();
}

$a = 'home';
if(isset($_GET['a'])){
    $a = $_GET['a'];
}


// ======================================
// ROUTES
// ======================================
switch ($a) {
    // ==================================
    // home
    case 'home':
        include_once('webgeral/home.php');
        break;
    // ==================================
    // Login
    case 'login':
        include_once('clientes/login.php');
        break;
    // Login
    case 'signup':
        include_once('clientes/signup.php');
        break;          
    
    
}

?>

