<?php
     // ========================================
    // perfil - alterar password
    // ========================================
    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
    }

?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col card m-3 p-3">
            <h4 class="text-center">ALTERAR PASSWORD</h4>
            <hr>
            <!-- formulário-->
            <form action="?a=perfil_alterar_password" method="post">
                <div classe="col-sm-4 offset-sm-4 justify-content-center">
                    <div class="form-group">
                        <label for="text_password_atual">Password atual:</label>
                        <input type="password" 
                               class="form-control" 
                               name="text_password_atual"
                               required title="No mínimo 3 caracteres e no máximo 20."
                               pattern=".{3,20}">
                    </div>                   
                </div>

                <div classe="col-sm-4 offset-sm-4 justify-content-center">
                    <div class="form-group">
                        <label for="text_password_nova_1">Nova Password:</label>
                        <input type="password" 
                               class="form-control" 
                               name="text_password_nova_1"
                               required title="No mínimo 3 caracteres e no máximo 20."
                               pattern=".{3,20}">
                    </div>                   
                </div>

                <div classe="col-sm-4 offset-sm-4 justify-content-center">
                    <div class="form-group">
                        <label for="text_password_nova_2">Repetir a nova Password:</label>
                        <input type="password" 
                               class="form-control" 
                               name="text_password_nova_2"
                               required title="No mínimo 3 caracteres e no máximo 20."
                               pattern=".{3,20}">
                    </div>                   
                </div>

                <div class="text-center">
                    <a href="?a=perfil" class="btn btn-primary btn-size-150">Calcelar</a>
                    <button role="submit" class="btn btn-primary btn-size-150">Alterar</button>                   
                </div>
                
            </form>          

        </div>
    </div>
</div>