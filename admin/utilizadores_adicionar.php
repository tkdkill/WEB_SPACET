<?php
    // ================================================
    // adicionar útilizadores adicionar novo utilizador
    // ================================================

    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
    }
    
    //verificar permissões
    $erro_permissao = false;
    if(!funcoes::Permissoes(0)){
        $erro_permissao = true;
    }

    $gestor = new cl_gestorBD();
    $erro = false;
    $sucesso = false;
    $mensagem = '';


    //=========================================================================================
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //ai buscar os valores do formulário
        $utilizador     = $_POST['text_utilizador'];
        $password       = $_POST['text_password'];
        $nome_completo  = $_POST['text_nome'];
        $email          = $_POST['text_email'];

        //permissões
        $total_permissoes = (count(include('inc/permissoes.php')));
        $permissoes = [];
        if(isset($_POST['check_permissao'])){
            $permissoes = $_POST['check_permissao'];
        }
        $permissoes_finais = '';
        for($i = 0; $i < 100; $i++){
            if($i < $total_permissoes){
                if(in_array($i, $permissoes)){
                    $permissoes_finais.= '1';
                } else{
                    $permissoes_finais.= '0';
                }
            }else{
                $permissoes_finais.= '1';
            }
        }

        /* echo $utilizador . ' ' . $password . ' ' . $nome_completo . ' ' . $email;
        var_dump($permissoes); */

        //-----------------------------------------------------------------------------
        // verifica os dados na base de dados

        // verifica se existe utilizador com o nome igual
         $parametros = [
             ':utilizador' => $utilizador
         ];
         $dtemp = $gestor->EXE_QUERY('SELECT utilizador 
                                      FROM utilizadores 
                                      WHERE utilizador = :utilizador', $parametros);
        if(count($dtemp) != 0){
            $erro = true;
            $mensagem = 'Já existe um utilizador com o mesmo nome.';
        }
        //-----------------------------------------------------------------------------
        // verifica se existe um utilizador com o mesmo email.
        if(!$erro){
            $parametros = [
                ':email' => $email
            ];
            $dtemp = $gestor->EXE_QUERY('SELECT email 
                                         FROM utilizadores 
                                         WHERE email = :email',$parametros);
        }
        if(count($dtemp) != 0){
            $erro = true;
            $mensagem = 'Já existe um utilizador com o mesmo email.';
        }
        //-----------------------------------------------------------------------------
        //guardar na base de dados
        if(!$erro){
            $parametros = [
                ':utilizador'       => $utilizador,
                ':palavra_passe'    => md5($password),
                ':nome'             => $nome_completo,
                ':email'            => $email,
                ':permissoes'       => $permissoes_finais, 
                ':criado_em'        => DATAS::DataHoraAtualBD(),
                ':atualizade_em'    => DATAS::DataHoraAtualBD()
            ];

            $gestor->EXE_NON_QUERY('INSERT INTO 
                                    utilizadores(utilizador, palavra_passe, nome, email, permissoes, criado_em, atualizado_em) 
                                    VALUES(:utilizador, :palavra_passe, :nome, :email, :permissoes, :criado_em, :atualizade_em)', $parametros);

            //enviar o email para o novo utilizador
            $mensagem = [
                $email,
                'SPACE - Criação de nova conta de utilizador',
                "<p>Foi criada a nova conta de utilizador com os seguintes dados:</p>
                <p>Utilizador: $utilizador</p>
                <p>Password: $password</p>"
            ];
            $mail = new emails();
            $mail->EnviarEmail($mensagem);


            //apresentar um alerta de sucesso
            echo '<div class="alert alert-success text-center">Novo utilizador adicionado com sucesso.</div>';

        }

        //testes
        //2018-01-10 23:29:15
        //echo DATAS::DataHoraAtualBD();

    }

    //=========================================================================================

?>
<!-- apresenta o erro no caso de exitir -->
<?php
    if($erro){
        echo '<div class="alert alert-danger text-center">' . $mensagem . '</div>'; 
    }
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-8 card m-3 p-3">
                <h4 class="text-center alert alert-secondary">Adicionar novo utilizador</i></h4>
                <hr>

                <!-- Formulário para adicionar novo utilizador -->
                <form action="?a=utilizadores_adicionar" method="post">
                    <!-- Útilizador -->
                    <div class="form-group">
                        <label for="text_utilizador">Utilizador:</label>
                        <input id="text_utilizador" 
                               placeholder="UserName"   
                               type="text" 
                               name="text_utilizador" 
                               class="form-control" 
                               pattern=".{3,50}" 
                               title="Entre 3 a 50 caracteres." 
                               required>                 
                    </div>

                     <!-- password -->
                     <div class="form-group">
                        <label for="text_password">Password:</label>
                        <div class="row">
                            <div class="col"> 
                                <input id="text_password" 
                                       placeholder="Password" 
                                       type="text" 
                                       class="form-control" 
                                       name="text_password" 
                                       class="form-control" 
                                       pattern=".{3,30}" 
                                       title="Entre 3 a 50 caracteres." 
                                       required>                
                            </div>
                             <div class="col">
                                <button type="button" class="btn btn-primary form-control" onclick="gerarPassword(10)">Gerar Password</button> 
                            </div>
                        </div>
                    </div>
                      <!-- Nome Completo -->
                    <div class="form-group">
                        <label for="text_nome">Nome:</label>
                        <input id="text_nome" 
                               placeholder="Nome completo" 
                               type="text" 
                               name="text_nome" 
                               class="form-control" 
                               pattern=".{3,50}" 
                               title="Entre 3 a 50 caracteres." 
                               required>                 
                    </div  >
                    <!-- Email -->
                    <div class="form-group">
                        <label for="text_email">E-mail:</label>
                        <input id="text_email" 
                               placeholder="exemple@gmail.com" 
                               type="email" 
                               name="text_email" 
                               class="form-control" 
                               pattern=".{3,50}" 
                               title="Entre 3 a 50 caracteres." 
                               required>                 
                    </div>                        
                    <div class="text-center">
                        <a href="?a=utilizadores_gerir" class="btn btn-primary btn-size-150">Calcelar</a>
                        <button class="btn btn-primary btn-size-150">Criar útilizador</button>
                    </div>
                    <hr>
                    <div class="text-center m-3">
                        <button type="button" 
                                class="btn btn-primary btn-size-150" 
                                data-toggle="collapse" 
                                data-target="#caixa_permissoes" 
                                aria-expanded="false" 
                                aria-controls="collapseExample">Definir permissões</button>
                    </div>
                    <!-- Caixa das Permissões -->             
                    <div class="collapse" id="caixa_permissoes">
                        <div class="card p-3 caixa_permissoes">
                            
                            <?php
                                $permissoes = include('inc/permissoes.php');
                                $id = 0;
                                //var_dump($permissoes);
                               foreach ($permissoes as $permissao) { ?>
                                <div class="checkbox">
                                    <label for="check_permissao">
                                        <input type="checkbox" name="check_permissao[]" id="check_permissao" value="<?php echo $id ?>">
                                        <span class="permissoes-titulo"><?php echo  $permissao['permissao'] ?></span> 
                                    </label><br>   
                                    <p class="permissoes-sumario"><?php echo  $permissao['sumario'] ?></p>
                                </div>
                                   
                            <?php $id++; } ?>

                            <!-- Todas | nenhumas -->
                            <div>
                                <a href="#" onclick="checks(true); return false">Todas</a> | <a href="#" onclick="checks(false); return false">Nenhumas</a>
                            </div>
                        </div>
                    </div>                                                   
                </form>                 
        </div>
    </div>
</div>