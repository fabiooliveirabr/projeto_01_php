<?php
session_start();
// Verificar se NÃO existe a variável logado
if(!isset($_SESSION['logado']) ){
    header("Location: login.php?erro2=SIM");
}
?>