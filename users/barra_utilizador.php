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
                <span class="mr-3"><i class="fa fa-user mr-3"></i> <?php echo $nome_utilizador?></span>
                <button class="btn btn-secondary dropdown-toggle" type="button" id="d1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="d1">
                    <a class="dropdown-item" href="?a=perfil"><i class="fa fa-user-o mr-2"></i>Acesso ao Perfil</a>
                    <a class="dropdown-item" href="?a=perfil_alterar_password"><i class="fa fa-lock mr-2" aria-hidden="true"></i>Alterar Password</a>
                    <a class="dropdown-item" href="?a=perfil_alterar_email"><i class="fa fa-envelope mr-2" aria-hidden="true"></i>Alterar Email</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="?a=logout"><i class="fa fa-sign-out mr-2"></i>Logout</a>
                </div>
            </div>
        <?php else : ?>
            <span class="<?php echo $classe ?>"><i class="fa fa-user"></i> <?php echo $nome_utilizador ?></span>    
        <?php endif; ?>
    </div>

