<?php
// ==================================
// setup
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

    //route do setup
    switch ($a) {
        case 'setup-criar-bd':
            //executa os procidimentos para criação da base de dados
            include('setup/setup_criar_bd.php');
            break;
            
        case 'setup_inserir_utilizadores':
            //inserir utilizadores
            include('setup/setup_inserir_utilizadores.php');
            break;
            
        
    }

?>

<div class="conteiner-fluide pad-20">
    <!-- Título -->
    <h2 class="text-center">SETUP</h2>
    <div class="text-center">  
        <p><a href="?a=setup-criar-bd" class="btn btn-secondary btn-size-250">Criar a Base de Dados</a></p>
        <p><a href="?a=setup_inserir_utilizadores" class="btn btn-secondary btn-size-250">Iserir Utilizadores</a></p>
        <hr>
        <p><a href="?a=inicio" class="btn btn-secondary btn-size-150">Voltar</a></p>

    </div>
</div>

