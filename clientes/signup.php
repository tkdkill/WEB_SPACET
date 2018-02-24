<?php
// ==================================
// Signup
// ==================================

// verificar a sessão
if(!isset($_SESSION['a'])){
    exit();
}

$erro = false;
$sucesso = false;
$mensagem = '';
$gestor = new cl_gestorBD();

// dados de Cliente
$nome      = '';
$email              = '';
$utilizador         = '';
$codigo_validacao = '';


// ==================================
// verifica se foi feito um post
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  //recolha dos dados
  $nome = $_POST['text_nome_completo'];
  $email = $_POST['text_email'];
  $utilizador = $_POST['text_utilizador'];
  $password = $_POST['text_password'];
  $confirma_password = $_POST['text_confirma_password'];

  //verifica se as senhas são correspondentes (iguais)
  if($password !== $confirma_password){
    $erro = true;
    $mensagem = 'As passwords não coincidem.';
    }
   /*  else{
        // dados de Cliente
        $nome      = '';
        $email              = '';
        $utilizador         = '';
        $mensagem = 'Utilizador Criado com sucesso'; 
    } */

    //verificar se já existe um cliente com os mesmos "dados"
    if(!$erro){
        $parametros = [
            ':nome'             => $nome,
            ':email'            => $email,
            ':utilizador'       => $utilizador
        ];

        $dados = $gestor->EXE_QUERY("SELECT id_cliente, nome, email, utilizador FROM Clientes 
                                     WHERE nome = :nome
                                     OR email = :email
                                     OR utilizador = :utilizador", $parametros);
        if(count($dados) != 0){
            $erro = true;
            $mensagem = 'Já existe um cliente com dados iguais.';
        }
    }

    //Vamos criar condições para criar a conta de cliente (em validação)
    if(!$erro){
        $codigo_validacao = funcoes::CriarCodigoAlfanumerico(30);
        $parametros = [
            ':nome'             => $nome,
            ':email'            => $email,
            ':utilizador'       => $utilizador,
            ':palavra_passe'    => md5($password),
            ':codigo_validacao' => funcoes::CriarCodigoAlfanumerico(30),
            ':validada'         => 0,
            ':criado_em'        => DATAS::DataHoraAtualBD(),
            ':atualizado_em'    => DATAS::DataHoraAtualBD()
        ];

        //Regista o cliente na base de dados    
        $gestor->EXE_NON_QUERY('INSERT INTO 
                               clientes
                               (nome, email, utilizador, palavra_passe, codigo_validacao, validada, criado_em, atualizado_em)
                               VALUES
                               (:nome, :email, :utilizador, :palavra_passe, :codigo_validacao, :validada, :criado_em, :atualizado_em)
                               ', $parametros);

        echo '<div class="alert alert-success  text-center">Utilizador Criado com sucesso</div>';
        //Limpar os campos
        // dados de Cliente
        $nome       = '';
        $email      = '';
        $utilizador = '';                      
    }
   /*  $mensagem = 'Utilizador Criado com sucesso'; */

}
?>
<!-- ERRO ======================================================================-->
<!-- apresenta o erro no caso de exitir -->
<?php
    if($erro){
        echo '<div class="alert alert-danger text-center">' . $mensagem . '</div>'; 
    }
     /* else{
        echo '<div class="alert alert-success text-center">' . $mensagem . '</div>'; 
    }  */
    
?>

<div class="container signup p-2">
    <div class="row mt-2 mb5">
        <div class="card col-sm-6 offset-sm-3 borda">
            <h4 class="text-center alert alert-secondary mt-3">CRIAÇÃO DE NOVO UTILIZADOR</h4>
            <form action="" method="post">
                <!-- Nome completo do cliente -->
                <div class="form-group">
                    <!-- <label for="nome_completo">Nome completo:</label> -->
                    <input class="form-control" 
                           type="text" 
                           name="text_nome_completo" 
                           id="nome_completo" 
                           placeholder="Nome Completo" 
                           value="<?php echo $nome?>" 
                           required>
                </div>
                <!-- email -->
                <div class="form-group">
                    <!-- <label for="email">E-mail:</label> -->
                    <input class="form-control" 
                           type="email" 
                           name="text_email" 
                           id="email" 
                           placeholder="Email" 
                           value="<?php echo $email ?>" 
                           required>
                </div>
                <!-- nome de utilizador -->
                <div class="form-group">
                    <!-- <label for="utilizador">Utilizador:</label> -->
                    <input class="form-control" 
                           type="text" 
                           name="text_utilizador" 
                           id="utilizador" 
                           placeholder="User" 
                           value="<?php echo $utilizador ?>" 
                           required>
                </div>
                <!-- password -->
                <div class="form-group">
                    <!-- <label for="password">Password:</label> -->
                    <input class="form-control" 
                           type="password" 
                           name="text_password" 
                           id="password" 
                           placeholder="Password" 
                           required>
                </div>
                <!-- confirma password -->
                <div class="form-group">
                    <!-- <label for="Confirma_password">Corfirmação Password:</label> -->
                    <input class="form-control" 
                           type="password" 
                           name="text_confirma_password" 
                           id="Confirma_password" 
                           placeholder="Confirmação Password" 
                           required>
                </div>
                <!-- Aceitação dos termos de utilização -->
                <div class="text-center mb-3">
                    <input class="mr-2" type="checkbox" name="check_termos" id="check_termos" required>
                    <label for="check_termos">Li e Aceito os <a href="">Termos de Utilização.</a></label>
                </div>
                <!-- Submeter -->
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-size-150 mb-3">Criar cliente</button>
                    <button class="btn btn-primary btn-size-150 mb-3" type="reset">Limpar Campos</button>
                </div>
            </form>

        </div>
    </div>
</div>