<?php
// ==================================
// setup
// ==================================

// verificar a sessão
if(!isset($_SESSION['a'])){
    exit();
}
?>

<div class="conteiner-fluide pad-20">
    <!-- Título -->
    <h2 class="text-center">SETUP</h2>
    <div class="text-center">  
        <a href="?a=setup-criar-bd" class="btn btn-secondary">Criar a BD</a>
        <hr>
        <a href="?a=inicio" class="btn btn-secondary">Voltal</a>

    </div>
</div>


