<?php
include "conexao.php";
 $desc = $_POST['descricao_digitada'];
 $setor = $_POST['setor_escolhido'];
 $cat =$_POST['categoria_digitada'];

//  1º Passo - Comando SQL
$sql = "INSERT INTO tb_inventarios
        (descricao, setor, categoria) VALUES
        ('$desc', '$setor', '$cat')";

//  2º Passo - Preparar a conexão
$inserir = $pdo->prepare($sql);

//  3º Passo - Tentar executar
try{
    $inserir->execute();
    echo "Cadastrado com sucesso!";
}catch(PDOException $erro){
    echo "Falha ao inserir" . $erro->getMessage();
}


?>