<?php
    // ========================================
    // formulário de recuperação de password
    // ========================================    
    
    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
    }
    /*
    - formulário que permite colocar um endereço de email
    - submeter o formulário e procurar o endereço de email na tabela dos utilizadores
    - se for encontrado um email, reformular a password e envia email para o usuário/utilizador
    - informa qual é a nova password
    */
?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4 card m-3 p-3">

            <form action="?a=recuperar_pasword" method="post">
                <div class="text-center">
                    <h3>Recuperar</h3>
                    <p>Coloque aqui o seu email para recuperação da sua password.</p>
                </div> 
                <div class="form-group">
                    <input type="email" name="text_utilizador" class="form-control" placeholder="email" required>
                </div>
                
                <div class="form-group text-center">
                    <a href="?a=inicio" class="btn btn-primary btn-size-150">Cancelar</a>
                    <button role="submit" class="btn btn-primary btn-size-150">Recuperar</button>
                </div>
            </form>         

        </div>
    </div>
</div>