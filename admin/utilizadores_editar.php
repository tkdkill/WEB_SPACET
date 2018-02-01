<?php
    // ================================================
    // Gestão de utilizadores - edita útilizador
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

    //verifica se id do utilizador está definido
    $id_utilizador = -1;
    if(isset($_GET['id'])){
        $id_utilizador = $_GET['id'];
    }else{
        $erro_permissao = true;
    }

    //verifica se pode avançar (id_utilizador != 1 ou != do da sessão
    if($id_utilizador == 1 || $id_utilizador == $_SESSION['id_utilizador']){
        $erro_permissao = true;
    }
    
    //=======================================================================
    $gestor = new cl_gestorBD();
    $dados_utilizador = null;

    $erro = false;
    $sucesso = false;
    $mensagem = '';

    if(!$erro_permissao){
        //buscar os dados do utilizador
        $parametros = [':id_utilizador' => $id_utilizador];
        $dados_utilizador = $gestor->EXE_QUERY('SELECT * FROM utilizadores WHERE id_utilizador = :id_utilizador', $parametros);
        //verifica se existe dados do utilizador
        if(count($dados_utilizador) == 0){
            $erro = true;
            $mensagem = 'Não foram encontrados dados do utilizador.';
        }
    }
    //=========================================================================================
    // POST
    //========================================================================================= 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //vai buscar os valores do formulário
        $nome_completo  = $_POST['text_nome'];
        $email          = $_POST['text_email'];

        //verificações se existe outro utilizador com o mesmo email
        $parametros = [
            ':id_utilizador' => $id_utilizador,
            ':email'         => $email
        ];
        $temp = $gestor->EXE_QUERY('SELECT * FROM utilizadores 
                                    WHERE id_utilizador <> :id_utilizador 
                                    AND email = :email', $parametros);
        if(count($temp) != 0){
            $erro = true;
            $mensagem = 'Já existe um utilizador com o mesmo email.';
        }
        //==================================================
        //atualiza os dados na base de dados
        if(!$erro){
            $parametros = [
            ':id_utilizador' => $id_utilizador,
            ':nome'          => $nome_completo,
            ':email'         => $email,
            ':atualizado_em' => DATAS::DataHoraAtualBD()
        ];
            $temp = $gestor->EXE_NON_QUERY('UPDATE utilizadores SET nome = :nome, email = :email, atualizado_em = :atualizado_em   
                                            WHERE id_utilizador = :id_utilizador', $parametros);

            $sucesso = true;
            $mensagem = 'Dados atualizados atualizados com sucesso.';

            //mostra os dados do utilizador atualizados
            $parametros = [
                ':id_utilizador' => $id_utilizador];
                $dados_utilizador = $gestor->EXE_QUERY('SELECT * FROM utilizadores 
                                                        WHERE id_utilizador = :id_utilizador', $parametros);

        }
        

    }
    //=========================================================================================     
?>

<?php if($erro_permissao) :?>
    <?php include('inc/sem_permissao.php') ?>
<?php else : ?>
    <!-- Erro de falta de dados -->
    <?php if ($erro) : ?>
        <div class="container">
            <div class="row justify-content-center">
                <div class="row card col-sm-8 m-3 p-3 justify-content-center text-center">
                    <p class="alert alert-danger"><?php echo $mensagem; ?></p>
                    <div class="test-center mb-2">
                        <a href="?a=utilizadores_gerir" class="btn btn-primary btn-size-150">Voltar</a>
                    </div>
                </div>
            </div>               
        </div>
    <?php  else : ?>
    <!-- Sucesso na alteração dos dados -->
    <?php  if($sucesso) : ?>  
    <!-- Apresenta uma mensagem de sucesso -->
    <div class="alert alert-success mb-3 text-center">
        <?php echo $mensagem; ?>                   
    </div>
    <?php endif; ?>

    <!-- Formulário com os dados para alteração -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="row card col-sm-8 m-3 p-3 justify-content-center">
                <h4 class="text-center alert alert-secondary">EDITAR DADOS DO UTILIZADOR</h4>
                <form action="?a=editar_utilizador&id=<?php echo $id_utilizador; ?>" method="post">
                    <div class="form-group">
                        <label for="">Utilizador:</label>
                        <p><strong><?php echo $dados_utilizador[0]['utilizador'];?></strong></p>
                    </div>
                    <!-- Nome Completo -->
                        <div class="form-group">
                            <label for="text_nome">Nome:</label>
                            <input id="text_nome" 
                                placeholder="<?php echo $dados_utilizador[0]['nome'];?>" 
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
                                placeholder="<?php echo $dados_utilizador[0]['email'];?>" 
                                type="email" 
                                name="text_email" 
                                class="form-control" 
                                pattern=".{3,50}" 
                                title="Entre 3 a 50 caracteres." 
                                required>                 
                        </div>
                        <div class="text-center">
                            <a href="?a=utilizadores_gerir" class="btn btn-primary btn-size-150">Calcelar</a>
                            <button class="btn btn-primary btn-size-150">Atualizar</button>
                        </div>                        
                </form>
            </div>
        </div>    
    </div>
    <?php endif; ?>        
<?php endif; ?>