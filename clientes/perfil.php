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

    //vamos buscar os dados do cliente
    $parametros = [
        ':id_cliente' => $_SESSION['id_cliente']
    ];

    $gestor = new cl_gestorBD();
    $dados_cliente = $gestor->EXE_QUERY('SELECT * FROM clientes WHERE id_cliente = :id_cliente', $parametros);

    $dados = $dados_cliente[0]; //passar os dados todos para um array unidimensional

?>

<div class="container-fluid perfil">
    <div class="container pt-5 pb-5">
        <div class="row">
            <div class="col-sm-6 offset-sm-3 col-12">


        <div id="accordion">
            <!-- Alterar utilizador -->
            <div class="card">
                <div class="card-header text-center" id="caixa_utilizador">
                <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#t_1" aria-expanded="true" aria-controls="collapseOne">
                        Anterar nome do utilizador
                    </button>
                </h5>
            </div>

            <div id="t_1" class="collapse show" aria-labelledby="caixa_utilizador" data-parent="#accordion">
                <div class="card-body">
                    <!-- Formulário para alterar o nome do utilizador -->
                    <p>Atual: <b>
                    <?php echo $dados['nome']; ?></b>
                    </p>

                    <form action="" method="post" class="mt-3">    
                        <div class="form-group input-group mb-6">
                            
                                <input type="text" name="txt_nome" placeholder="Novo Nome" required>                  
                            
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary btn-sm ml-2 btn-size-100">Gravar</button>
                            </div> 
                        </div>  
                    </form>





                </div>
                </div>
            </div>
            <!-- Alterar email -->
            <div class="card">
                <div class="card-header text-center" id="caixa_email">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#t_2" aria-expanded="false" aria-controls="collapseTwo">
                        Anterar o email
                    </button>
                    </h5>
            </div>
                <div id="t_2" class="collapse" aria-labelledby="caixa_email" data-parent="#accordion">
                    <div class="card-body">
                        <!-- Formulário para alterar o email do utilizador -->
                        <p>Atual:<b>
                        <?php echo $dados['email']; ?></b>
                        </p>

                        <form action="" method="post" class="mt-3">    
                        <div class="form-group input-group mb-6">
                            
                                <input type="text" name="txt_nome" placeholder="Novo email" required>                  
                            
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary btn-sm ml-2 btn-size-100">Gravar</button>
                            </div> 
                        </div>  
                    </form>


                    </div>
                </div>
            </div>
            <!-- Alterar password -->
            <div class="card">
                <div class="card-header text-center" id="caixa_password">
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