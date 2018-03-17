<?php 
    // ========================================
    // setup - inserir clientes
    // ========================================
    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
    } 

    // ---------------------------------------------------
    $nomes_homem = [
        'Carlos', 'Alberto', 'Adriano', 'Americo', 'Rodrigo'
    ];

    $nomes_mulher = [
        'Ana', 'Maria', 'Isabel', 'Laura', 'Teresa', 'Catarina', 'Carolina'
    ];

    $aplidos = [
        'Marques', 'Alves', 'Silva', 'Pereira', 'Teixeira', 'Rodrigues', 'Martins', 'Oliveira'
    ];

    //=========================================================
    //inserir o utilizador cliente
    $gestor = new cl_gestorBD();
    $numero_clientes = 50;

    //Limpar a tabela de clientes e zerar o outo_increment
    $gestor->EXE_NON_QUERY('DELETE FROM clientes');
    $gestor->EXE_NON_QUERY('ALTER TABLE clientes AUTO_INCREMENT = 1');

    //"criar" cada um dos clientes e inserir na base de dados
    for($i = 0; $i < $numero_clientes; $i++){
        // define o género (masculino ou feminino)
        $genero = rand(1,2);

        //define o nome do cliente
        $nome = '';
        if($genero == 1){
            $nome = $nomes_homem[rand(0, count($nomes_homem))] . ' ' . $aplidos[rand(0, count($aplidos))] . ' ' . $aplidos[rand(0, count($aplidos))];
        }else{
            $nome = $nomes_mulher[rand(0, count($nomes_mulher))] . ' ' . $aplidos[rand(0, count($aplidos))] . ' ' . $aplidos[rand(0, count($aplidos))];
        }

        //inserir na base de dados
    }





  ?>  