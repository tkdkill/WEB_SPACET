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

        <?php if(funcoes::VerificarLogin()): ?>    
            
            <!-- dropdown -->
            <div class="dropdown">
                <i class="fa fa-user"></i> <?php echo $nome_utilizador?>
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="?a=perfil"><i class="fa fa-user-o"></i> Acesso ao Perfil</a>
                    <a class="dropdown-item" href="?a=perfil_alterar_password"><i class="fa fa-lock" aria-hidden="true"></i> Alterar password</a>
                    <a class="dropdown-item" href="?a=logout"><i class="fa fa-sign-out"></i> Logout</a>
                </div>
            </div>
        <?php else : ?>
            <span class="<?php echo $classe ?>"><i class="fa fa-user"></i> <?php echo $nome_utilizador ?></span>    
        <?php endif; ?>
    </div>

