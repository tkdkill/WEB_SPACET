<?php
// ==================================
// barra de cliente web  ---- inserir espaços &nbsp;&nbsp;
// ==================================

// verificar a sessão
if(!isset($_SESSION['a'])){
    exit();
}
?>

<!-- Barra do cliente -->
    <div class="container-fluid barra-cliente">
      <div class="text-right"><span>
      <a href="?a=login" class="mr-3"><i class="fas fa-sign-in-alt"></i> Login</a>|
      <a href="?a=signup" class="ml-3"> <i class="fas fa-user-plus"></i> Signup</a></span>
      </div>
    </div>