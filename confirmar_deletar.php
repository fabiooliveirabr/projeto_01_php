<?php
include "verificar_logado.php";
$codigo = $_GET['cod'];

echo "
        <h1>
          Tem certeza que deseja apagar o item
          de nº $codigo? 
        </h1><br>
        <a href='deletar.php?cod=$codigo'>Sim</a> <br><br>
        <a href='pagina_gerenciar.php'>Não</a> 
     ";

?>