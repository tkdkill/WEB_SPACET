<?php
    // ==================================
    // formulário de login
    // ==================================

    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
    }

    //verificar se foi feito um POST

?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4 card m-3 p-3">
            <form action="?a=login" method="post">
                <div class="form-group">
                    <input type="text" id="text_utilizador" class="form-control" placeholder="Utilizador" name="Utilizador">
                </div>
                <div class="form-group">
                    <input type="password" id="text_password" class="form-control" placeholder="Password" name="Password">
                </div>
                <div class="form-group text-center">
                    <button role="submit" class="btn btn-primary btn-size-150">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>