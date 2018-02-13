<?php
// ==================================
// barra de cliente web
// ==================================

// verificar a sessão
if(!isset($_SESSION['a'])){
    exit();
}
?>

<!-- Barra do cliente -->
    <div class="container-fluid barra-cliente">
      <div class="text-right"><span><a href="http://"><i class="fas fa-sign-in-alt"> Login</i></a> | <a href="http://"> <i class="fas fa-user-plus"> Signup</i></a></span></div>
    </div>