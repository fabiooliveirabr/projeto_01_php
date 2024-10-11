<?php
include "conexao.php";
$codigo = $_POST['codigo'];
$desc = $_POST['descricao_digitada'];
$setor = $_POST['setor_escolhido'];
$cat = $_POST['categoria_digitada'];

// 1º Passo - Comando SQL
$sql = "UPDATE tb_inventarios SET
        descricao='$desc', setor='$setor',
        categoria='$cat' WHERE codigo='$codigo'";
// 2º Passo - Preparar a conexão
$atualizar = $pdo->prepare($sql);

// 3º Passo - Tentar executar
try{
    $atualizar->execute();
    echo "Atualizado com sucesso";
    echo "<br> <a href='pagina_gerenciar.php'> Voltar </a>";
}catch(PDOException $erro){
    echo "Falha ao atualizar!".$erro->getMessage();
}



?>