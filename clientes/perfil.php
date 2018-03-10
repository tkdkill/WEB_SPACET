<?php
    // ==================================
    // Configurações de perfil
    // ==================================

    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
    }

    if(!funcoes::VerificarLoginCliente()){
        exit();
    }


?>

<div class="container-fluid perfil">
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col col-sm-6 offset-sm-3 col-12">


        <div id="accordion">
            <!-- Alterar utilizador -->
            <div class="card">
                <div class="card-header" id="caixa_utilizador">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#t_1" aria-expanded="true" aria-controls="collapseOne">
                        Anterar nome de utilizador
                    </button>
                </h5>
            </div>

            <div id="t_1" class="collapse show" aria-labelledby="caixa_utilizador" data-parent="#accordion">
                <div class="card-body">
                    <!-- Formulário para alterar o utilizador -->





                </div>
                </div>
            </div>
            <!-- Alterar email -->
            <div class="card">
                <div class="card-header" id="">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#t_2" aria-expanded="false" aria-controls="collapseTwo">
                        Anterar o email
                    </button>
                    </h5>
            </div>
                <div id="t_2" class="collapse" aria-labelledby="caixa_email" data-parent="#accordion">
                    <div class="card-body">
                        <!-- Formulário para alterar o email do utilizador -->



                    </div>
                </div>
            </div>
            <!-- Alterar password -->
            <div class="card">
                <div class="card-header" id="caixa_password">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#t_3" aria-expanded="false" aria-controls="collapseThree">
                            Anterar Passworde
                        </button>
                    </h5>
                </div>
            <div id="t_3" class="collapse" aria-labelledby="caixa_password" data-parent="#accordion">
                <div class="card-body">
                    <!-- Formulário para alterar a password do utilizador -->


                </div>
            </div>
        </div>
        </div>



        </div>
        </div>
    </div>
</div>