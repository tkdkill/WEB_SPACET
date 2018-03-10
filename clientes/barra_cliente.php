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

        <!-- Cliente logado -->
        <?php if(funcoes::VerificarLoginCliente()) : ?>
        
        
        <!-- <i class="fas fa-cog mr-2 ml-3"></i> -->
        <!-- <i class="fas fa-sign-out-alt"></i> -->
        <div class="dropdown">
                <span class="mr-3"><i class="fas fa-user mr-2"></i> <?php echo $_SESSION['nome_cliente']?></span>
                <button class="btn btn-secondary dropdown-toggle dropdown-cliente-bt" type="button" id="d1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                </button>
                <div class="dropdown-menu dropdown-cliente barra-cliente-logado" aria-labelledby="d1">
                    <a class="dropdown-item" href="?a=perfil"><i class="far fa-user mr-2"></i>Acesso ao Perfil</a>
                    <div class="dropdown-divider"></div>     

                    <a class="dropdown-item" href="?a=logout_cliente"><i class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                </div>
            </div>    
        
        <?php else : ?>

        <!-- Cliente não logado -->
        <div class="dropdown d=inline">
            <!-- inrerreptor -->
            <a href="?a=login" class="mr-3 id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false""><i class="fas fa-sign-in-alt"></i> Login</a>|
            <!-- Caixa -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <form action="?a=login" class="px-4 py-3" method="Post">
                <div class="form-group">
                    <label for="txtUtilizador">Utilizador</label>
                    <input type="text" 
                           class="form-control" 
                           name="text_utilizador" 
                           id="txtUtilizador" 
                           placeholder="username" 
                           required 
                           patter=".{3,20}"
                           title="Entre 3 e 20 caracteres.">
                </div>
                <div class="form-group">
                    <label for="txtPassword">Password</label>
                    <input type="password" 
                           class="form-control" 
                           name="text_password" 
                           id="txtPassword" 
                           placeholder="Password" 
                           required 
                           patter=".{3,20}"
                           title="Entre 3 e 20 caracteres.">
                           
                </div>
                <div class="form-check">
                    <input type="checkbox" name="text_checkbox" class="form-check-input ml-1" id="dropdownCheck">
                    <label class="form-check-label ml-1" for="dropdownCheck">
                        Mantenha-me ligado
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary btn-size-100">Entrar</button>
                <a href="?a=signup" class="btn btn-primary btn-size-100">Signup</a><br><br>
                <div class="text-center dropdown-menu-naoLogado">
                    <a href="#">Recuperar Senha?</a>
                </div>
                </form>       
            </div>
                <div class="d-inline">     
                    <a href="?a=signup" class="ml-3"> <i class="fas fa-user-plus"></i> Signup</a></span>
                </div>
        </div>
    <?php endif;?>    
    </div>
</div>    
