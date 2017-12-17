<?php
    // ========================================
    // formulário de recuperação de password
    // ========================================    
    
    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
    }

    $erro = false;
    $mensagem = '';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $text_email = $_POST['text_email'];

        //criar o objeto da base de dados
        $gestor = new cl_gestorBD();

        //parametros
        $parametros = [
            ':email' => $text_email
        ];

        //pesquisar na bd para verificar se existe conta de utilizador com este email
        $dados = $gestor->EXE_QUERY(
            'SELECT * FROM utilizadores WHERE email = :email',$parametros);

        //verificar se foi encontrado o email
        if(count($dados) == 0){
            $erro = true;
            $mensagem = 'Não foi encontrado conta de utilizador com esse email!';
            
            //no caso de não haver erro (foi encontrada conta de utilizador com email indicado)
        }else{
            // recuperar a password
            echo 'OK';
        }
        
        

    }



    /*
    - formulário que permite colocar um endereço de email
    - submeter o formulário e procurar o endereço de email na tabela dos utilizadores
    - se for encontrado um email, reformular a password e envia email para o usuário/utilizador
    - informa qual é a nova password
    */
?>

<?php if($erro): ?>
    <div class="alert alert-danger text-center">
        <?php echo $mensagem ?>
    </div>
<?php endif; ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4 card m-3 p-3">

            <form action="?a=recuperar_password" method="post">
                <div class="text-center">
                    <h3>Recuperar</h3>
                    <p>Coloque aqui o seu email para recuperação da sua password.</p>
                </div> 
                <div class="form-group">
                    <input type="email" name="text_email" class="form-control" placeholder="email" required>
                </div>
                
                <div class="form-group text-center">
                    <a href="?a=inicio" class="btn btn-primary btn-size-150">Cancelar</a>
                    <button role="submit" class="btn btn-primary btn-size-150">Recuperar</button>
                </div>
            </form>         

        </div>
    </div>
</div>