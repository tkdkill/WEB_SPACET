<?php
// ==================================
// Barra do utilizador
// ==================================

// verificar a sessão
if(!isset($_SESSION['a'])){
    exit();
}

$nome_utilizador = 'Nenhum utilizador ativo.';
$classe = 'barra_utilizador_inativo';

//verificar se existe sessão
 if(funcoes::VerificarLogin()){
        $nome_utilizador = $_SESSION['nome'];
        $classe = 'barra_utilizador_ativo';
    }

?>

    <div class="barra_utilizadores">
        <span class="<?php echo $classe ?>"><i class="fa fa-user"></i> <?php echo $nome_utilizador ?></span>

        <?php if(funcoes::VerificarLogin()): ?>
            &nbsp|&nbsp<a href="?a=perfil"><i class="fa fa-user-o"></i> Perfil</a>
            &nbsp|&nbsp<a href="?a=logout"><i class="fa fa-sign-out"></i> Logout</a>
        <?php endif; ?>

    </div>
