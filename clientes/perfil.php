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

    //====================================================
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $p = $_GET['p'];

        switch ($p) {
            //-----------------------------------------
            case 1:
                # alterar o nome do utilizador
                echo 'nome de cliente ';

                break;
            //-----------------------------------------
            case 2:
                # alterar o email do utilizador
                echo 'Email de cliente ';

                break;    
            //-----------------------------------------
            case 3:
                # alterar a password do utilizador
                echo 'password de cliente ';

                break;
        }
    }
    



    //====================================================

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
        <h4 class="text-center alert alert-secondary col-sm-6 offset-sm-3 col-12">Editar Perfil de Cliente</i></h4>
        <hr class="col-sm-6 offset-sm-3 col-12">
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
                        Nome atual: <b><?php echo $dados['nome']; ?></b>

                        <form action="?a=perfil&p=1" method="post" class="mt-3">    
                            <div class="form-group">
                                <input type="text" 
                                       class="form-control" 
                                       name="txt_nome" 
                                       placeholder="Novo Nome" 
                                      required> 
                            </div>                         
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary btn-sm ml-2 btn-size-100">Alterar</button>
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
                        Email atual: <b><?php echo $dados['email']; ?></b>

                        <form action="?a=perfil&p=2" method="post" class="mt-3">    
                        <div class="form-group">
                            <input type="email" 
                                   class="form-control" 
                                   name="txt_email" 
                                   placeholder="Novo email" 
                                   required>
                        </div>
                        <div class="form-group">
                            <input type="email" 
                                   class="form-control" 
                                   name="txt_email_repetir" 
                                   placeholder="Confirmar email" 
                                   required>
                        </div>                                                   
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary btn-sm ml-2 btn-size-100">Alterar</button>
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
                    Utilizador atual: <b><?php echo $dados['utilizador']; ?></b>
                    <form action="?a=perfil&p=3" method="post" class="mt-3">
                        <div class="form-group">
                            <input type="password" 
                                   class="form-control" 
                                   name="txt_senha_atual" 
                                   placeholder="Insira a password atual" 
                                   required>
                        </div>    
                        <div class="form-group">
                            <input type="password" 
                                   class="form-control" 
                                   name="txt_senha_nova" 
                                   placeholder="Nova password" 
                                   required>
                        </div>
                        <div class="form-group">
                            <input type="password" 
                                   class="form-control" 
                                   name="txt_senha_nova_1" 
                                   placeholder="Confirmar a nova password" 
                                   required>
                        </div>                                      
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary btn-sm ml-2 btn-size-100">Alterar</button>
                        </div>                         
                    </form>


                </div>
            </div>
        </div>
        </div>



        </div>
        </div>
    </div>
</div>