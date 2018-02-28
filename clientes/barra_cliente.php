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

        <div class="dropdown">
            <!-- inrerreptor -->
            <a href="?a=login" class="mr-3 id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false""><i class="fas fa-sign-in-alt"></i> Login</a>|
            <!-- Caixa -->
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <form class="px-4 py-3" method="Post">
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
                           name="text_utilizador" 
                           id="txtPassword" 
                           placeholder="Password" 
                           required 
                           patter=".{3,20}"
                           title="Entre 3 e 20 caracteres.">
                           
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input ml-1" id="dropdownCheck">
                    <label class="form-check-label ml-1" for="dropdownCheck">
                        Mantenha-me ligado
                    </label>
                </div>
                
                <button type="submit" class="btn btn-primary btn-size-100">Entrar</button>
                <a href="?a=signup" class="btn btn-primary btn-size-100">Signup</a><br><br>
                <div class="text-center">
                    <a href="#">Recuperar Senha?</a>
                </div>
                </form>       
            </div>     
                <a href="?a=signup" class="ml-3"> <i class="fas fa-user-plus"></i> Signup</a></span>
        </div>
    </div>
</div>    


