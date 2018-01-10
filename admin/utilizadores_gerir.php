<?php
    // ==================================
    // gestão de útilizadores
    // ==================================

    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
    }
    
    //verificar permissões
    $erro_permissao = false;
    if(!funcoes::Permissoes(0)){
        $erro_permissao = true;

    }

?>

<?php if($erro_permissao) :?>

    <?php include('inc/sem_permissao.php') ?>

<?php else : ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col card m-3 p-3">
                <div class="text-center">
                    <h4 class="text-center">GESTÃO DE UTILIZADORES</h4>          
                    <a href="?a=inicio" class="btn btn-primary btn-size-150">Voltar</a>
                    <a href="?a=utilizadores_adicionar" class="btn btn-primary btn-size-150">Novo utilizador...</a>
                </div>
                <?php //Tabela dos utilizadores registados na base de dados ?>
                <div class="table-responsive row m-3 p-3">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <th scope="col">Utilizador</th>
                            <th scope="col">Nome completo</th>
                            <th scope="col">Email</th>
                            <th scope="col">Ação</th>
                        </thead>
                        <?php
                            $gestor = new cl_gestorBD();
                            $dados_utilizadores = $gestor->EXE_QUERY(
                                'SELECT * FROM utilizadores'
                            );
                        ?>
                        <?php foreach ($dados_utilizadores as $utilizador) : ?>
                            <tr>
                                <td><?php echo $utilizador['utilizador']; ?></td>
                                <td><?php echo $utilizador['nome']; ?></td>
                                <td><?php echo $utilizador['email']; ?></td>
                                <td>
                                    <!-- dropdown -->
                                    <?php $id = $utilizador['id_utilizador']; ?>
                                    <div class="dropdown">
                                        <i class="fa fa-cog" id="d1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <!-- <i class="fa fa-cog" aria-hidden="true"></i> -->
                                        </i>
                                        <div class="dropdown-menu" aria-labelledby="d1">
                                            <a class="dropdown-item disabled" href="?a=editar_utilizador&id=<?php echo $id; ?>"><i class="fa fa-edit mr-2"></i>Editar utilizador</a>
                                            <a class="dropdown-item disabled" href="?a=editar_permissoes&id=<?php echo $id; ?>"><i class="fa fa-list mr-2" aria-hidden="true"></i>Editar permissões</a>
                                            <a class="dropdown-item disabled" href="?a=eliminar_utilizador&id=<?php echo $id; ?>"><i class="fa fa-trash mr-2" aria-hidden="true"></i>Eliminar utilizador</a>
                                        </div>
                                    </div>                             
                                </td>
                            </tr>                        
                        <?php endforeach;?>
                    </table>   
                </div>
            </div>       
        </div>
    </div>
<?php endif; ?>
