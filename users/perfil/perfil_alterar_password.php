<?php
     // ========================================
    // perfil - alterar password
    // ========================================
    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
    }

    // defino o erro
    $erro = false;
    $sucesso = false;
    $mensagem = '';

    //verifica se foi feito um post
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // busca pelos valores inserido nos inpusts
        $password_atual =  $_POST['text_password_atual'];
        $password_nova_1 = $_POST['text_password_nova_1'];
        $password_nova_2 = $_POST['text_password_nova_2'];

        $gestor = new cl_gestorBD();

        //-------------------------------------
        //verificações

        //verifica se a password atual está correta
        $parametros = [
            ':id_utilizador'    => $_SESSION['id_utilizador'],
            ':palavra_passe'         => md5($password_atual)
        ];

        $dados = $gestor->EXE_QUERY(
            'SELECT id_utilizador, palavra_passe FROM utilizadores
             WHERE id_utilizador = :id_utilizador
             AND palavra_passe = :palavra_passe',$parametros);
             if(count($dados) == 0){
                 //password atual errada
                 $erro = true;
                 $mensagem = 'A password atual não coincide.';
             }

        if(!$erro){
            //verifica se as duas passwords novas coincidem
            if($password_nova_1 != $password_nova_2){
                $erro = true;
                $mensagem = 'A nova password a sua repetição não correspondem!';
            }
        }
        
        //atualizar a password na bd 
        if(!$erro){
            $data_atualizacao = new DateTime();
            $parametros = [
            ':id_utilizador'    => $_SESSION['id_utilizador'],
            ':palavra_passe'    => md5($password_nova_1),
            ':atualizado_em'    => $data_atualizacao->format('Y-m-d H:i:s')
            ];

            $gestor->EXE_NON_QUERY(
                'UPDATE utilizadores SET palavra_passe = :palavra_passe, atualizado_em = :atualizado_em 
                 WHERE id_utilizador = :id_utilizador',$parametros);

            $sucesso = true;
            $mensagem = 'Password atualizada com sucesso.';
            //Cria o LOG
            funcoes::CriarLOG('Utilizador ' . $_SESSION['nome'] . ' alterou a sua password', $_SESSION['nome']);    
        }

        /*
        1. a password atual tem que ser igual à da bd
        2. passworda nova 1 tem de ser igual à password 2
        3. alterar password na bd
        NOTA: cuidado com o MD5!!!!!
        */
    }
// ============================================================================================================
?>
<?php if($erro) : ?>
    <div class="alert alert-danger text-center">
        <?php echo $mensagem ?>
    </div>
<?php endif;?>

<?php if($sucesso) : ?>
    <div class="alert alert-success text-center">
        <?php echo $mensagem ?>
    </div>
<?php endif;?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col card m-3 p-3">
            <h4 class="text-center alert alert-secondary">ALTERAR PASSWORD</h4>
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
                    <a href="?a=perfil" class="btn btn-primary btn-size-150">Voltar</a>
                    <button role="submit" class="btn btn-primary btn-size-150">Alterar</button>                   
                </div>
                
            </form>          

        </div>
    </div>
</div>
