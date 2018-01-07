<?php

    //=================================
    // classe para tratamento de datas
    //=================================

    class DATAS{
        //=============================
        public static function DataHoraAtualBD(){
            //retrna a data e hora atual formatada para a base de dados
            $data = new DateTime();
            return $data->format('Y-m-d H:i:s');

            //mais antiga
            //return date('Y-m-d H:i:s');
        }
    }

?>