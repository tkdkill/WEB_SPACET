<?php
    // ==================================
    // Validar conta de cliente
    // ==================================

    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
    }
    /*
        Procedimentos a ter em conta
        1. cliente novo que se regista (conta) recebe email.
        email --> link
        clica no link -> site -> validar a conta (validação=0 -> validade=1)

        2. e se ele clicar novamente no link do email
        3. e se o cliente altera o código de validação manualmente?
    */
    $erro = false;
    $mensagem = "";

    //verifica se o valor 'v' está definido no url
    if(!isset($_GET['v'])){
        $erro = true;
        $mensagem = "Não está definido o código de ativação.";
    }
    // se 'v' está definido, avança no processo
    if(!$erro){
        //vamos buscar o código de ativação
        $codigo_ativacao = $_GET['v'];

        //vamos perguntar à BD se existe um cliente com este código de ativação
        $gestor = new cl_gestorBD();
        $parametros = [
            ':codigo_validacao'  => $codigo_ativacao
        ];
        $dados = $gestor->EXE_QUERY('SELECT * FROM clientes WHERE codigo_validacao = :codigo_ativacao', $parametros);

        //verificar se foi encontrado um cliente com o código de ativação
        if(count($dados) == 0){
            // não foi encontrado nunhum cliente como código indicado
            $erro = true;
            $mensagem = "Não existe nenhum cliente com esse código.";
        }

        //vamos verificar se validada já estava com valor 1
        if(!$erro){
            
        }

    }
?>

<?php if($erro): ?>
    <div class="alert alert-danger text-center"><?php $mensagem ?></div>;
    
<?php else :  ?>

<?php endif; ?>