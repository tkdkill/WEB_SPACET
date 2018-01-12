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
                                    <?php 
                                        $id = $utilizador['id_utilizador'];
                                        $op_editar = true;
                                        $op_permissoes = true;
                                        $op_eleminar = true;

                                        //analiza o utilizador atual
                                        //no caso de ser o admin original
                                        if($id == 1){
                                            $op_editar = false;
                                            $op_permissoes = false;
                                            $op_eleminar = false;
                                        }

                                        //no caso de ser o próprio admnistrador
                                        if($id != 1 && $id == $_SESSION['id_utilizador']){
                                            $op_editar = false;
                                            $op_permissoes = false;
                                            $op_eleminar = false;
                                        }
                                    ?>
                                    <div class="dropdown">
                                        <i class="fa fa-cog" id="d1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <!-- <i class="fa fa-cog" aria-hidden="true"></i> -->
                                        </i>
                                        <div class="dropdown-menu" aria-labelledby="d1">
                                        <?php
                                            //opção editar 
                                            if($op_editar){
                                                echo '<a class="dropdown-item disabled" href="?a=editar_utilizador&id='. $id . '"><i class="fa fa-edit mr-2"></i>Editar utilizador</a>';
                                            }
                                            //opção permissões
                                            if($op_permissoes){
                                            //opção eliminar
                                                echo '<a class="dropdown-item" href="?a=editar_permissoes&id=<' . $id .'"><i class="fa fa-list mr-2" aria-hidden="true"></i>Editar permissões</a>';
                                            }
                                            if($op_eleminar){
                                                echo '<a class="dropdown-item" href="?a=eliminar_utilizador&id=<'. $id .'"><i class="fa fa-trash mr-2" aria-hidden="true"></i>Eliminar utilizador</a>';
                                            }

                                            //nocaso de não haver opções
                                            if(!$op_editar && !$op_eleminar && !$op_eleminar){
                                                echo '<p class="p-2">Sem opções</p>';
                                            }
                                        ?>                                 
                                            
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
