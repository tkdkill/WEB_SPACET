<?php
// ==================================
// inicio
// ==================================

// verificar a sessão
if(!isset($_SESSION['a'])){
    exit();
}
?>
<p>INICIO</p>
<a href="?a=about">Acerca de</a>
|
<a href="?a=setup">instalação</a>

