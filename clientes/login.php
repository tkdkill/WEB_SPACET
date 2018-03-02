<?php
// ==================================
// login de cliente web  ---- inserir espaços &nbsp;&nbsp;
// ==================================

// verificar a sessão
if(!isset($_SESSION['a'])){
    exit();
}

$erro = false;
$sucesso = false;
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
    $sucesso = true;
    $mensagem = "login com sucesso";

}


/* echo "$utilizador <br> $password <br> $manterLogado"; */

?>

<?php if($erro): ?>
    <div class="alert alert-danger text-center"><?php echo $mensagem ?></div>
    
<?php elseif($sucesso) :  ?>
    <div class="alert alert-success text-center">
        <p>O utilizador <?php echo $utilizador . "&nbsp efetuou o " . $mensagem ?></p>
    </div>

<?php endif; ?>
