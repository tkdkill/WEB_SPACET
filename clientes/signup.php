<?php
// ==================================
// Signup
// ==================================

// verificar a sessão
if(!isset($_SESSION['a'])){
    exit();
}

?>

<div class="container signup p-2">
    <div class="row mt-5 mb5">
        <div class="card col-sm-6 offset-sm-3 borda">
            <h4 class="text-center alert alert-secondary mt-3">CRIAÇÃO DE NOVO UTILIZADOR</h4>
            <form action="" method="post">
                <!-- Nome completo do cliente -->
                <div class="form-group">
                    <label for="nome_completo">Nome completo:</label>
                    <input class="form-control" type="text" name="text_nome_completo" id="nome_completo" placeholder="Nome Completo" require>
                </div>
                <!-- email -->
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input class="form-control" type="email" name="text_email" id="email" placeholder="Email" require>
                </div>
                <!-- nome de utilizador -->
                <div class="form-group">
                    <label for="utilizador">Utilizador:</label>
                    <input class="form-control" type="text" name="text_utilizador" id="utilizador" placeholder="User" require>
                </div>
                <!-- password -->
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input class="form-control" type="password" name="text_password" id="password" placeholder="Password" require>
                </div>
                <!-- confirma password -->
                <div class="form-group">
                    <label for="Confirma_password">Corfirmação Password:</label>
                    <input class="form-control" type="confirma_password" name="text_confirma_password" id="Confirma_password" placeholder="Confirmação Password" require>
                </div>
                <!-- Aceitação dos termos de utilização -->
                <div class="text-center">
                    <input class="mr-2" type="checkbox" name="check_termos" id="check_termos" require>
                    <label for="check_termos">Li e Aceito os <a href="">Termos de Utilização.</a></label>

                </div>

                <!-- Submeter -->
                <div class="text-center">
                <button class="btn btn-primary btn-size-150 mb-3">Criar cliente</button>
                <button class="btn btn-primary btn-size-150 mb-3" type="reset">Limpar Campos</button>
                </div>
            </form>

        </div>
    </div>
</div>