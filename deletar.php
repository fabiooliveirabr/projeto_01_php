<?php
include "conexao.php";
$codigo = $_GET['cod'];

// 1º Passo - Comando SQL
$sql = "DELETE FROM tb_inventarios
        WHERE codigo='$codigo' ";

// 2º Passo - Preparar a conexão
$deletar = $pdo->prepare($sql);

// 3º Passo - Tentar executar
try{
    $deletar->execute();
    echo "Deletado com sucesso!";
    echo "<br> <a href='pagina_gerenciar.php'> Voltar </a>"
}catch(PDOException $erro){
    echo "Falha ao deletar!" . $erro->getMessage();
}



?>