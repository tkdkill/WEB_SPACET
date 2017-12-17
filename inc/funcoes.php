<?php
    // ==================================
    // Funções estáticas
    // ==================================

    // verificar a sessão
    if(!isset($_SESSION['a'])){
        exit();
    }

    //=================================================
    class funcoes{

        //=================================================
        public static function VerificarLogin(){
            //verifica se o utilizador sessão ativa
            $resultado = false;
            if(isset($_SESSION['id_utilizador'])){
                $resultado = true;
            }
            return $resultado;
        }

        //=================================================
        public static function IniciarSessao($dados){
            //iniciar sessão
            $_SESSION['id_utilizador'] = $dados[0]['id_utilizador'];
             $_SESSION['nome'] = $dados[0]['nome'];
            

        }

        //=================================================
        public static function DestroiSessao(){
            //destroi as variáveis de sessão
            unset($_SESSION['id_utilizador']);
            unset($_SESSION['nome']);
        }

        //=================================================
        public static function CriarCodigoAlfanumerico($numChars){
            //criar um código leatório alfanumérico
            $codigo = '';
            $caracteres = 'abcdefghijklmopqrstvxywzABCDEFGHIJKLMOPQRSTVXYWZ0123456789!?*()-%';
            for($i = 0; $i < $numChars; $i++){
                $codigo .= substr($caracteres, rand(0, strlen($caracteres)), 1);
            }
            return $codigo;

        }
    }
    

?>