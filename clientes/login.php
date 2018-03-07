<?php
// ==================================
// login de cliente web  ---- inserir espaços &nbsp;&nbsp;
// ==================================

// verificar a sessão
if(!isset($_SESSION['a'])){
    exit();
}

$erro = false;
/* $sucesso = false; */
$mensagem = '';

//verifica se os dados de login estão corretos
$utilizador = $_POST['text_utilizador'];
$password = md5($_POST['text_password']);
/* $manterLogado = $_POST['text_checkbox']; */

//prepara a query para o login
$gestor = new cl_gestorBD();
$parametros = [
    ':utilizador'   => $utilizador,
    'palavra_passe' => $password
];

$dados = $gestor->EXE_QUERY('SELECT * 
                             FROM clientes 
                             WHERE utilizador = :utilizador 
                             AND palavra_passe = :palavra_passe', 
                             $parametros);

//verifica se existe dados
if(count($dados) == 0){
    //não foi encontrado nenhum cliente com os adados indicados
    $erro = true;
    $mensagem = "Não existe cliente com essa conta.";
}else{
    //caso exista um cliente, vamos verificar se a conta está validada
    if($dados[0]['validada'] == 0){
        $erro = true;
        $mensagem = "Atenção: verifique a sua caixa de correio eletrónico, uma vez que a sua conta de cliente não foi ainda validada.";
    }
}

if(!$erro){
    //login efetuado com sucesso
    /* $sucesso = true;
    $mensagem = "login efetuado com sucesso"; */

    funcoes::IniciarSessaoCliente($dados);

}

/* echo "$utilizador <br> $password <br> $manterLogado"; */

?>

<?php if($erro): ?>
    <div class="alert alert-danger text-center"><?php echo $mensagem ?></div>
    
<?php else :  ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 offset-4 borda text-center mt-5 mb-5 card p-4">
                <p>Bem-vindo(a) <b><?php echo $dados[0]['nome'] ?>.</p>
                <div class="col-12 text-center mt-3">
                    <a href="?a=home" class="btn btn-primary btn-size-150 center">Ok</a>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
